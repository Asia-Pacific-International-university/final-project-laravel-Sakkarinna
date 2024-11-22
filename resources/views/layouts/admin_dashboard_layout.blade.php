<!-- resources/views/layouts/admin_dashboard_layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <h1 class="h3">Sakkarin News - Admin</h1>
        <nav>
            <a href="{{ route('profile.show') }}" class="text-white me-3">Profile</a>
            <a href="{{ route('logout') }}" class="text-white"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </header>

    <div class="flex">
        <aside class="w-64 bg-gray-100 p-4 h-screen">
            <button data-collapse-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200" aria-expanded="false">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div id="sidebar" class="hidden md:block">
                <ul class="space-y-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:bg-gray-200 p-2 rounded">Dashboard</a></li>
                    <li><a href="{{ route('categories.index') }}" class="block text-gray-700 hover:bg-gray-200 p-2 rounded">Categories</a></li>
                    <li><a href="{{ route('articles.index') }}" class="block text-gray-700 hover:bg-gray-200 p-2 rounded">Articles</a></li>
                    <li><a href="{{ route('users.index') }}" class="block text-gray-700 hover:bg-gray-200 p-2 rounded">Users</a></li>
                </ul>
            </div>
        </aside>

        <main class="flex-grow p-6">
            @yield('content')
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
