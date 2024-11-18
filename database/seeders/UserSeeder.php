<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as MashHash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => MashHash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => MashHash::make('password'),
                'role' => 'user',
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@gmail.com',
                'password' => MashHash::make('password'),
                'role' => 'guest',
            ]
        ]);
    }
}
