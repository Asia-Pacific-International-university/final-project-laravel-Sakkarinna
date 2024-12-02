<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Article;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        return view('profiles.edit_profile');
    }



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Show user profile
    public function ownerProfile()
    {
        $articles = auth()->user()->articles()->latest()->get();
        return view('profiles.owner_profile', compact('articles'));
    }



    public function othersProfile(User $user)
    {
        $articles = Article::where('user_id', $user->id)->latest()->get();

        return view('profiles.others_profile', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }



    // Update user profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->update($request->only(['name', 'email']));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
