<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'minutes_to_read',
        'status',
        'author_id',
        'body',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->author_id = Auth::id();
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'author_id' => 'integer',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(\App\Models\Comments::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
