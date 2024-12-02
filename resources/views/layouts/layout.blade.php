<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Layout')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">
</head>
<body class="bg-gray-100 h-screen flex flex-col">
    <!-- Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-lg font-bold">Sakkarin News</h1>
        <nav class="flex space-x-4">
            @guest
                <!-- If the user is not logged in -->
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @else
                <!-- If the user is logged in -->
                <a href="{{ route('profile.show') }}" class="hover:underline">Profile</a>
                <a href="{{ route('logout') }}" class="hover:underline"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow p-6">
        @yield('content')
    </main>

    <!-- Include Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>
    <script src="/node_modules/simple-datatables/dist/simple-datatables.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectionTable = document.getElementById("selection-table");
            if (selectionTable) {
                new simpleDatatables.DataTable(selectionTable);
            }
        });
    </script>
</body>
</html>
