<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    // No relationships needed since it is handled through User's relationships
}
