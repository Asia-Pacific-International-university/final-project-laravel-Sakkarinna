<!-- resources/views/articles/all_articles.blade.php -->
@extends('layouts.layout')

@section('title', 'All Articles')

@section('content')
@if($articles && $articles->count() > 0)
@foreach($articles as $article)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ $article->image_url }}" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ route('profile.others', $article->user->id) }}">{{ $article->user->name }}</a>
                <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                <div>
                    <button class="btn btn-outline-primary btn-sm">Like</button>
                    <button class="btn btn-outline-secondary btn-sm">Follow Author</button>
                    @if(auth()->check() && auth()->id() == $article->user_id)
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@else
<p>No articles available at the moment.</p>
@endif

@endsection
