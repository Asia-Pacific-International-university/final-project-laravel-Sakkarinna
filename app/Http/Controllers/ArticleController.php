<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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


}
