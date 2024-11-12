<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'First News Article',
            'content' => 'This is the content of the first article.',
            'category_id' => 1, // Assuming category 1 exists
            'user_id' => 1, // Assuming user 1 exists
        ]);
    }
}
