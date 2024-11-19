<!-- resources/views/admin/categories/edit_category.blade.php -->
@extends('layouts.admin_dashboard_layout')

@section('title', 'Edit Category')

@section('content')
    <div class="container mt-4">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
