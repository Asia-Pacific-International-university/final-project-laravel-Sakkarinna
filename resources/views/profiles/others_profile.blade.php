<!-- resources/views/profiles/others_profile.blade.php -->
@extends('layouts.layout')

@section('title', 'User Profile')

@section('content')
    <div class="container mt-4">
        <!-- Profile Section -->
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h1>{{ $user->name }}</h1>
                    <p>Member since: {{ $user->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <form action="{{ route('profile.follow', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Follow</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Articles Section -->
        <h2>{{ $user->name }}'s Articles</h2>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
