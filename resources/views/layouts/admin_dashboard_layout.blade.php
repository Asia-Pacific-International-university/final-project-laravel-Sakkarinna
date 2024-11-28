<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
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

    <div x-data="{ open: true }" class="flex">
        <!-- Sidebar -->
        <aside
            :class="open ? 'w-64' : 'w-20'"
            class="bg-gray-800 min-h-screen text-gray-100 transition-all duration-300"
        >
            <div class="flex justify-between items-center p-4">
                <h1
                    x-show="open"
                    class="text-lg font-bold tracking-wide whitespace-nowrap"
                >
                    Admin Panel
                </h1>
                <button @click="open = !open" class="text-gray-300 hover:text-white">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 6h16.5m-16.5 6h16.5"
                        />
                    </svg>
                </button>
            </div>

            <nav class="mt-6">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-4 px-4 py-2 hover:bg-gray-700 transition rounded-md group">
                            <div class="text-gray-300 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l1.5 2h15l1.5-2M10 21V9l6 12" />
                                </svg>
                            </div>
                            <span x-show="open" class="text-sm font-medium text-gray-300 group-hover:text-white">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="flex items-center space-x-4 px-4 py-2 hover:bg-gray-700 transition rounded-md group">
                            <span x-show="open" class="text-sm font-medium text-gray-300 group-hover:text-white">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('articles.index') }}" class="flex items-center space-x-4 px-4 py-2 hover:bg-gray-700 transition rounded-md group">
                            <span x-show="open" class="text-sm font-medium text-gray-300 group-hover:text-white">Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center space-x-4 px-4 py-2 hover:bg-gray-700 transition rounded-md group">
                            <span x-show="open" class="text-sm font-medium text-gray-300 group-hover:text-white">Users</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
