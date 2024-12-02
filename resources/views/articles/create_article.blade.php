@extends('layouts.layout')

@section('title', 'Create News')

@section('content')
    <div class="container mt-4">
        <h1>Create News</h1>
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select id="category" name="category_id" class="form-control" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="6" required></textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
            </div>

            <!-- Video Upload -->
            <div class="mb-3">
                <label for="video" class="form-label">Upload Video</label>
                <input type="file" id="video" name="video" class="form-control" accept="video/*">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
