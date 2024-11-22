<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Log;


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

        $model = $this->resolveModel($type, $id);
        if (!$model) {
            return redirect()->back()->withErrors('Invalid follow target.');
        }

        // Check if the user is already following the model
        if ($user->followings()->where('followable_id', $model->id)->where('followable_type', get_class($model))->exists()) {
            $user->followings()->where('followable_id', $model->id)->where('followable_type', get_class($model))->delete();
        } else {
            $user->followings()->create([
                'followable_id' => $model->id,
                'followable_type' => get_class($model),
            ]);
        }
        Log::info('Follow model resolved:', ['model' => $model]);


        return redirect()->back();
    }

    protected function resolveModel($type, $id)
{
    if ($type === 'user') {
        return User::find($id); // Return null if not found
    } elseif ($type === 'article') {
        return Article::find($id);
    }

    return null; // Return null for invalid types
}

}
