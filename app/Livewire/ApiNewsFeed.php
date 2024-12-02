<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApiNewsFeed extends Component
{
    public $newsArticles = [];
    public $page = 1; // Current pagination page
    public $hasMore = true; // Determines if there are more articles to load

    public function mount()
    {
        // Load the initial set of articles
        $this->loadArticles();
    }

    public function loadMore()
    {
        $this->page++;
        $this->loadArticles();
    }

    private function loadArticles()
    {
        // Get the API key from the configuration
        $apiKey = config('services.newscatcher.api_key');

        // Define the API endpoint and headers
        $apiUrl = 'https://api.newscatcherapi.com/v2/latest_headlines';
        $queryParams = [
            'countries' => 'US',
            'topic' => 'tech',
            'page' => $this->page,
        ];

        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
        ])->get($apiUrl, $queryParams);

        if ($response->successful()) {
            $newArticles = $response->json()['articles'] ?? [];
        } else {
            $newArticles = [];
        }

        // Merge new articles with existing ones
        $this->newsArticles = array_merge($this->newsArticles, $newArticles);

        // Check if there are no more articles
        if (count($newArticles) === 0) {
            $this->hasMore = false;
        }
    }

    public function render()
    {
        return view('livewire.api-news-feed');
    }
}
