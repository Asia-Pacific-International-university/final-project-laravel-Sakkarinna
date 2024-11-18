<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Show single article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Show the form to create an article
    public function create()
    {
        return view('articles.create');
    }

    // Store a new article
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Article::create($validated);

        return redirect()->route('articles.index');
    }

    // Show the form to edit an article
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Update an article
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article->update($validated);

        return redirect()->route('articles.index');
    }

    // Delete an article
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
