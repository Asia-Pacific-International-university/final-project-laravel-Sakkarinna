<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships

    /**
     * Get all the articles of the user.
     *
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get all the likes of the user.
     *
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get all the comments of the user.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all followers of the user.
     *
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    /**
     * Get all users the current user is following.
     *
     * @return BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    /**
     * Get all articles the user is following.
     *
     * @return BelongsToMany
     */
    public function followedArticles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'follows', 'follower_id', 'article_id');
    }

    /**
     * Check if the user is following another user.
     *
     * @param User $user
     * @return bool
     */
    public function isFollowing(User $user): bool
    {
        return $this->followings()->where('followed_id', $user->id)->exists();
    }

    /**
     * Check if the user has liked an article.
     *
     * @param Article $article
     * @return bool
     */
    public function hasLikedArticle(Article $article): bool
    {
        return $this->likes()->where('likeable_id', $article->id)->where('likeable_type', Article::class)->exists();
    }

    /**
     * Check if the user has liked a comment.
     *
     * @param Comment $comment
     * @return bool
     */
    public function hasLikedComment(Comment $comment): bool
    {
        return $this->likes()->where('likeable_id', $comment->id)->where('likeable_type', Comment::class)->exists();
    }
}
