<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'description',
    ];

    // Relationships
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
