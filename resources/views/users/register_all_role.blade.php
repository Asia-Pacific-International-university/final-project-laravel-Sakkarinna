@extends('layouts.admin_dashboard_layout')

@section('title', 'Register User')

@section('content')
<div class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Register User</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-1">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-lg font-semibold text-gray-700 mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-lg font-semibold text-gray-700 mb-1">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-lg font-semibold text-gray-700 mb-1">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-lg font-semibold text-gray-700 mb-1">Role</label>
            <select
                id="role"
                name="role"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required
            >
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="guest">Guest</option>
            </select>
        </div>

        <!-- Profile Picture -->
        <div>
            <label for="profile_pic" class="block text-lg font-semibold text-gray-700 mb-1">Profile Picture</label>
            <input
                type="file"
                id="profile_pic"
                name="profile_pic"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none"
            >
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200"
            >
                Register
            </button>
        </div>
    </form>
</div>
@endsection
