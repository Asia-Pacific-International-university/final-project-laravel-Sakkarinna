<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
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
        $articles = $user->articles()->latest()->get();
        return view('profiles.others_profile', compact('user', 'articles'));
    }

    public function followUser(User $user)
    {
        $currentUser = auth()->user();
        $currentUser->follows()->attach($user->id);

        return redirect()->route('profile.others', $user->id)->with('success', 'You are now following ' . $user->name);
    }

    // Update user profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
