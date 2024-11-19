<!-- resources/views/articles/edit_article.blade.php -->
@extends('layouts.layout')

@section('title', 'Edit Article')

@section('content')
    <div class="container mt-4">
        <h1>Edit Article</h1>
        @if($article->created_at->diffInDays(now()) > 2)
            <div class="alert alert-danger">
                You can only edit an article within 2 days of creation.
            </div>
        @else
            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" value="{{ $article->title }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label">Select Categories (up to 5)</label>
                    <select id="categories" name="categories[]" class="form-control" multiple required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $article->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="6" required>{{ $article->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        @endif
    </div>
@endsection
