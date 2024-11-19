<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'article_id',
        'content',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}