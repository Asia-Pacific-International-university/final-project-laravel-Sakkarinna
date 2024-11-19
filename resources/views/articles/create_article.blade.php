<!-- resources/views/articles/create_article.blade.php -->
@extends('layouts.layout')

@section('title', 'Create Article')

@section('content')
    <div class="container mt-4">
        <h1>Create Article</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Select Categories (up to 5)</label>
                <select id="categories" name="categories[]" class="form-control" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
