<!-- resources/views/articles/view_articles.blade.php -->
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
                    <button class="btn btn-outline-primary me-2">Like</button>
                    <button class="btn btn-outline-secondary me-2">Follow Author</button>
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
                            <button class="btn btn-outline-primary btn-sm me-2">Like ({{ $comment->likes_count }})</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
