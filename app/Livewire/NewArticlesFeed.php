<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class NewArticlesFeed extends Component
{
    public $articles = []; // Stores visible articles
    public $page = 1;      // Current pagination page
    public $hasMore = true; // Determines if there are more articles to load

    public function mount()
    {
        // Load initial 5 articles
        $this->loadArticles();
    }

    public function loadMore()
    {
        $this->page++;

        // Load more articles and append them to the existing list
        $this->loadArticles();
    }

    private function loadArticles()
    {
        $newArticles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'page', $this->page);

        // Merge new articles into existing ones
        $this->articles = array_merge($this->articles, $newArticles->items());

        // Check if there are no more articles
        if ($newArticles->currentPage() >= $newArticles->lastPage()) {
            $this->hasMore = false;
        }
    }

    public function render()
    {
        return view('livewire.new-articles-feed');
    }
}
