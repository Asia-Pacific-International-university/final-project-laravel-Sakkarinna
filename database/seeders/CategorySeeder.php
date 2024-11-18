<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Technology',
            'description' => 'Latest trends and updates in technology.',
        ]);

        Category::create([
            'name' => 'Health',
            'description' => 'Health-related news and articles.',
        ]);

        Category::create([
            'name' => 'Sports',
            'description' => 'Sports news and updates from around the world.',
        ]);
    }
}
