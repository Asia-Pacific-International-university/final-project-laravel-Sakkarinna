<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Like;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Like::class;

    public function definition()
    {
        // By default, likes are for articles. Comment ID will be null.
        return [
            'user_id' => User::factory(),
            'article_id' => Article::factory(), // Default to liking articles
            'comment_id' => null, // Default is no comment associated
        ];
    }

    // State for creating likes for comments
    public function forComment()
    {
        return $this->state(function (array $attributes) {
            return [
                'article_id' => null, // Remove association with articles
                'comment_id' => Comment::factory(), // Link to a random comment
            ];
        });
    }
}
