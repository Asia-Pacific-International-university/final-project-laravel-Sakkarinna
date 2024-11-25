<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class NewArticlesFeed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $page = 1; // Tracks the current page for infinite scrolling

    public $hasMore = true;

    public function loadMore()
    {
        $this->page++;
        if (Article::count() <= $this->page * 5) {
            $this->hasMore = false;
        }
    }

    public function render()
    {
        $articles = Article::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'page', $this->page);

        return view('livewire.new-articles-feed', [
            'articles' => $articles,
            'hasMore' => $this->hasMore,
        ]);
    }
}
