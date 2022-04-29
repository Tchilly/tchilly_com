<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property mixed $updated_at
 * @property mixed $created_at
 * @property mixed $time_span
 * @property string $preamble
 * @property int $category_id
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property int $id
 */
class Post extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, Searchable;

    protected const collection_name = "post";
    protected const truncated_length = 120;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'preamble',
        'category_id',
        'user_id',
        'time_span',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'category',
        'user',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo',
        'photo_object',
        'photo_image',
        'created_at_formatted',
        'updated_at_formatted',
        'time_span_formatted',
        'is_updated',
        'recently_updated',
        'truncated_preamble',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Get the options for generating the slug.
     *
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'posts_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'preamble' => $this->preamble,
            'body' => $this->body,
        ];

    }

    /*************************************************
     * Media handling
     * @todo Move this to a separate controller and/or trait
     *************************************************/

    public function registerMediaCollections(Media $media = null): void
    {
        $this
            ->addMediaCollection(self::collection_name)
            ->useFallbackUrl('/images/post-fallback-image.png')
            ->singleFile()
            ->withResponsiveImages();
        //
    }

    /**
     * Update the post cover photo.
     *
     * @param UploadedFile $photo
     * @return void
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function updatePhoto(UploadedFile $photo): void
    {
        $this
            ->addMedia($photo)
            ->toMediaCollection(self::collection_name);
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     * @throws MediaCannotBeDeleted
     */
    public function deletePhoto(): void
    {
        $this->deleteMedia($this->getFirstMedia(self::collection_name));
    }

    /*************************************************
     * Relations
     *
     *************************************************/

    /**
     * Get the author of the blog post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categories for the blog post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Modify the query used to retrieve models when making all of the models searchable.
     *
     * @param Builder $query
     * @return Builder
     */
    protected function makeAllSearchableUsing($query): Builder
    {
        return $query->with(['category', 'user']);
    }

    /*************************************************
     * Attributes
     *
     *************************************************/

    /**
     * Return a truncated preamble with fallback.
     *
     * @return Attribute
     */
    protected function truncatedPreamble(): Attribute
    {
        return Attribute::make(
            get: fn() => str($this->preamble)->limit(self::truncated_length) ?:
                str($this->body)->limit(self::truncated_length)
        );
    }

    /**
     * Return a photo url.
     *
     * @return Attribute
     */
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn() => self::getFirstMediaUrl(self::collection_name)
        );
    }

    /**
     * Return a image object.
     *
     * @return Attribute
     */
    protected function photoObject(): Attribute
    {
        return Attribute::make(
            get: fn() => self::getFirstMedia(self::collection_name)
        );
    }

    /**
     * Return a responsive image tag.
     *
     * @return Attribute
     */
    protected function photoImage(): Attribute
    {
        return Attribute::make(
            get: fn() => self::getFirstMedia(self::collection_name) ?
                self::getFirstMedia(self::collection_name)->toHtml() :
                null
        );
    }

    /**
     * Check if record has recently been updated.
     *
     * @return Attribute
     */
    protected function recentlyUpdated(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->greaterThan(Carbon::now()->subHour()),
        );
    }

    /**
     * Check if record has been updated.
     *
     * @return Attribute
     */
    protected function isUpdated(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->greaterThan($this->created_at)
        );
    }

    /**
     * Return a formatted created_at.
     *
     * @return Attribute
     */
    protected function createdAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->toDateString()
        );
    }

    /**
     * Return a formatted updated_at.
     *
     * @return Attribute
     */
    protected function updatedAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->toDateString()
        );
    }

    /**
     * Return a formatted reading time.
     *
     * @return Attribute
     */
    protected function timeSpanFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->time_span ?
                CarbonInterval::seconds($this->time_span)->cascade()->forHumans() . ' read' :
                null
        );
    }


}
