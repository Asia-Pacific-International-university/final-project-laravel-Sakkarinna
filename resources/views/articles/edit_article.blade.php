@extends('layouts.layout')

@section('title', 'Edit Article')

@section('content')
    <div class="container mt-4">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select id="category" name="category_id" class="form-control" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="6" required>{{ $article->content }}</textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @if ($article->pic_path)
                    <img src="{{ asset('storage/' . $article->pic_path) }}" alt="Current Image" class="img-fluid mt-2">
                @endif
            </div>

            <!-- Video Upload -->
            <div class="mb-3">
                <label for="video" class="form-label">Upload Video</label>
                <input type="file" id="video" name="video" class="form-control" accept="video/*">
                @if ($article->vid_path)
                    <video controls class="w-100 mt-2">
                        <source src="{{ asset('storage/' . $article->vid_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
