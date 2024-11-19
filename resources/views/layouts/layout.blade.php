<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sakkarin News')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
        <h1 class="h3">Sakkarin News</h1>
        <nav>
            {{-- <a href="{{ route('home') }}" class="text-white me-3">Home</a> --}}
            <a href="{{ route('articles.index') }}" class="text-white me-3">Articles</a>
            @guest
                <a href="{{ route('login') }}" class="text-white me-3">Login</a>
                <a href="{{ route('register') }}" class="text-white">Register</a>
            @else
                <a href="{{ route('profile.show') }}" class="text-white me-3">Profile</a>
                <a href="{{ route('logout') }}" class="text-white"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
