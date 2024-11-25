@extends('layouts.layout')

@section('title', $article->title)

@section('content')
    <div class="container mt-4">
        <!-- Article Section -->
        <div class="card mb-4">
            <img src="{{ $article->image_url }}" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h1>{{ $article->title }}</h1>
                <p>By <a href="{{ route('profile.others', $article->user->id) }}">{{ $article->user->name }}</a></p>
                <p><small class="text-muted">Published: {{ $article->created_at->format('M d, Y') }}</small></p>
                <div class="mb-3">{{ $article->content }}</div>
                <div class="d-flex">
                    <!-- Like Button -->
                    <form action="{{ route('like', ['type' => 'article', 'id' => $article->id]) }}" method="POST"
                        class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">
                            Like ({{ $article->likes->count() }})
                        </button>
                    </form>

                    <!-- Follow Author Button -->
                    <form action="{{ route('follow', ['type' => 'user', 'id' => $article->user->id]) }}" method="POST"
                        class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            {{ auth()->user() &&auth()->user()->followings()->where('followable_id', $article->user->id)->where('followable_type', 'App\\Models\\User')->exists()? 'Unfollow Author': 'Follow Author' }}
                        </button>
                    </form>

                    <!-- Follow Article Button -->
                    <form action="{{ route('follow', ['type' => 'article', 'id' => $article->id]) }}" method="POST"
                        class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            {{ auth()->user() &&auth()->user()->followedArticles()->where('followable_id', $article->id)->exists()? 'Unfollow Article': 'Follow Article' }}
                        </button>
                    </form>


                    <!-- Edit Button (only for the author) -->
                    @if (auth()->check() && auth()->id() == $article->user_id)
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="card mt-4">
            <div class="card-header">Add a Comment</div>
            <div class="card-body">
                @auth
                    <form action="{{ route('comments.store', $article->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
                @endauth
            </div>
        </div>

        <!-- Comments List -->
        <div class="mt-4">
            <h3>Comments ({{ $comments->count() }})</h3>
            @foreach ($comments->sortByDesc('likes_count') as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $comment->content }}</p>
                        <p class="text-muted">By {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                        </p>
                        <div class="d-flex">
                            <!-- Like Comment Button -->
                            <form action="{{ route('like', ['type' => 'comment', 'id' => $comment->id]) }}" method="POST"
                                class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    Like ({{ $comment->likes->count() }})
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
