@php
    $layout = auth()->check() && auth()->user()->role === 'admin'
        ? 'layouts.admin_dashboard_layout'
        : 'layouts.layout';
@endphp

@extends($layout)

@section('title', 'Edit Profile')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold text-gray-700">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ auth()->user()->name }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ auth()->user()->email }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-full font-semibold hover:from-blue-600 hover:to-blue-800 transition duration-200 shadow-md hover:shadow-lg"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
