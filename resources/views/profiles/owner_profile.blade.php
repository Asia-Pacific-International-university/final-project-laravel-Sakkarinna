<!-- resources/views/profiles/owner_profile.blade.php -->
@extends('layouts.layout')

@section('title', 'My Profile')

@section('content')
    <div class="container mt-4">
        <!-- Profile Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h1>{{ auth()->user()->name }}</h1>
                <p>Email: {{ auth()->user()->email }}</p>
                <p>Member since: {{ auth()->user()->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <!-- Articles Section -->
        <h2>My Articles</h2>
        <div class="row">
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
                            <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
