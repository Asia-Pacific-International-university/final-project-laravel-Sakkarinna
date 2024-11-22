<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Services\DataTable;

class NewsController extends Controller
{
    public function apiNews()
    {
        // Get the API key from configuration
        $apiKey = config('services.newscatcher.api_key');

        // Define the API endpoint and headers
        $apiUrl = 'https://api.newscatcherapi.com/v2/latest_headlines?countries=US&topic=tech';

        // Fetch news from the API
        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
        ])->get($apiUrl);

        if ($response->successful()) {
            $newsArticles = $response->json()['articles'] ?? [];
        } else {
            $newsArticles = [];
        }

        // Pass the news articles to the view
        return view('articles.api_news', compact('newsArticles'));
    }
}
