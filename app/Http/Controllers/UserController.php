<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function test()
    {
        $users = User::paginate(50);

        return view('test', compact('users'));
    }

    public function index()
    {
        $users = User::all();
        return view('users.all_users', compact('users'));
    }

    public function create()
    {
        return view('users.register_all_role');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:user,admin,guest',
            'profile_pic' => 'nullable|image|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if ($request->hasFile('profile_pic')) {
            $user->profile_picture = $request->file('profile_pic')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User registered successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit_user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,guest',
            'profile_pic' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->hasFile('profile_pic')) {
            $user->profile_picture = $request->file('profile_pic')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    public function like($type, $id)
{
    $user = auth()->user();
    $model = null;

    // Determine the model type (either Article or Comment)
    switch ($type) {
        case 'article':
            $model = Article::findOrFail($id);
            break;
        case 'comment':
            $model = Comment::findOrFail($id);
            break;
        default:
            abort(404, 'Invalid type provided.');
    }

    // Check if the user has already liked the model
    if ($user->likes()->where('likeable_id', $model->id)
        ->where('likeable_type', get_class($model))->exists()) {
        $user->likes()->where('likeable_id', $model->id)
            ->where('likeable_type', get_class($model))
            ->delete();
    } else {
        $user->likes()->create([
            'likeable_id' => $model->id,
            'likeable_type' => get_class($model),
        ]);
    }

    return redirect()->back();
}

}
