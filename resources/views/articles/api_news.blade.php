<!-- resources/views/articles/api_news.blade.php -->
@extends('layouts.layout')

@section('title', 'API News')

@section('content')
    <div class="container mt-4">
        <h1>News from Google News API</h1>
        <div class="row">
            @foreach($newsArticles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $article['thumbnail'] ?? '/path/to/default-image.jpg' }}" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">{{ Str::limit($article['snippet'], 100) }}</p>
                            <a href="{{ $article['link'] }}" target="_blank" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted">Source: {{ $article['source'] ?? 'Unknown' }}</small>
                            <small class="text-muted">Published: {{ $article['published'] ?? 'Unknown' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection