<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_url',
        'user_id'
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'article_id', 'follower_id');
    }

    // Custom Methods

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function addLike(User $user)
    {
        if (!$this->isLikedBy($user)) {
            $this->likes()->create(['user_id' => $user->id]);
        }
    }

    public function removeLike(User $user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
