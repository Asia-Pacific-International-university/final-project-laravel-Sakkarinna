<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticlesFeed extends Component
{
    public $articles = []; // Holds visible articles
    public $page = 1;      // Tracks the current page
    public $hasMore = true; // Tracks if more articles are available

    public function mount()
    {
        // Load the initial batch of articles
        $this->loadArticles();
    }

    public function loadMore()
    {
        $this->page++;
        $this->loadArticles();
    }

    private function loadArticles()
    {
        $newArticles = Article::orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'page', $this->page);

        $this->articles = array_merge($this->articles, $newArticles->items());

        if ($newArticles->currentPage() >= $newArticles->lastPage()) {
            $this->hasMore = false;
        }
    }

    public function render()
    {
        return view('livewire.articles-feed');
    }
}
