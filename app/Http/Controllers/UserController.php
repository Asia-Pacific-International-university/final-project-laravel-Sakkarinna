<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Fetch 20 users
        $users = User::limit(20)->get();

        // Map users to assign images from the API
        $users->map(function ($user) {
            // Assign random image from Lorem Picsum
            $user->profile_picture = "https://picsum.photos/seed/" . $user->id . "/100";
            return $user;
        });

        // Pass the users to the view
        return view('index', compact('users'));
    }
}
