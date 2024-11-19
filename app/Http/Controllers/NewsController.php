<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function apiNews()
    {
        // API URL
        $apiUrl = 'https://serpapi.com/search';

        // Fetch news from the API
        $response = Http::get($apiUrl);
        $newsArticles = $response->json()['news_results'] ?? [];

        // Pass the news articles to the view
        dd($newsArticles);
        // return view('articles.api_news', compact('newsArticles'));
    }
}
