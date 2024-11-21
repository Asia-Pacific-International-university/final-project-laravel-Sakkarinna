<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Log;



class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::all();

    Log::info($articles);

    return view('articles.all_articles', compact('articles'));
}


public function show(Article $article)
{
    // Load the comments with the article
    $comments = $article->comments()->withCount('likes')->get();

    return view('articles.view_articles', compact('article', 'comments'));
}

public function like(Article $article)
{
    $user = auth()->user();

    // Check if the user has already liked the article
    $like = $article->likes()->where('user_id', $user->id)->first();

    if ($like) {
        // If the user has liked it, delete the like
        $like->delete();
    } else {
        // Otherwise, create a new like
        $article->likes()->create(['user_id' => $user->id]);
    }

    return redirect()->back();
}




}
