<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

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
        'created_at_formatted'
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
            ->addMediaCollection('post-collection')
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
     * Return a formatted created_at.
     *
     * @return Attribute
     */
    protected function timeSpan(): Attribute
    {
        return Attribute::make(
            get: fn($value) => CarbonInterval::seconds($value)->cascade()->forHumans()
        );
    }

}
