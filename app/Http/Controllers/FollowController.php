<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class FollowController extends Controller
{
    public function follow($type, $id)
    {
        $user = auth()->user();
        $model = null;

        // Determine the model type (either Article or User)
        switch ($type) {
            case 'article':
                $model = Article::findOrFail($id);
                break;
            case 'user':
                $model = User::findOrFail($id);
                break;
            default:
                abort(404, 'Invalid type provided.');
        }

        // Check if the user is already following the model
        if ($user->followings()->where('followable_id', $model->id)
            ->where('followable_type', get_class($model))->exists()) {
            $user->followings()->where('followable_id', $model->id)
                ->where('followable_type', get_class($model))
                ->delete();
        } else {
            $user->followings()->create([
                'followable_id' => $model->id,
                'followable_type' => get_class($model),
            ]);
        }

        return redirect()->back();
    }
}
