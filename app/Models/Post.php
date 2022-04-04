<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected const collection_name = "post";

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
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
        'has_been_updated',
        'recently_updated'
    ];

    /**
     * Get the options for generating the slug.
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

    public function registerMediaCollections(Media $media = null): void
    {
        $this
            ->addMediaCollection(self::collection_name)
            ->singleFile()
            ->withResponsiveImages();
        //
    }

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
        $this->deleteMedia(self::getFirstMedia(self::collection_name));
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
            get: fn() => self::getFirstMedia(self::collection_name) ? self::getFirstMedia(self::collection_name)->toHtml() : null
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
    protected function timeSpan(): Attribute
    {
        return Attribute::make(
            get: fn($value) => CarbonInterval::seconds($value)->cascade()->forHumans()
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
    protected function hasBeenUpdated(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at->greaterThan($this->created_at)
        );
    }

}