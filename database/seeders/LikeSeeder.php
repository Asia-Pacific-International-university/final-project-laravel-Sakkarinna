<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    public function run()
    {
        // Generate likes for articles
        Like::factory()->count(50)->create();


        // Generate likes for comments
        Like::factory()->forComment()->count(20)->create();

    }
}
