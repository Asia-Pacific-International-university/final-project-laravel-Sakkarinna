<!-- resources/views/layouts/admin_dashboard_layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
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

    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 bg-light p-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categories</a></li>
                    <li class="nav-item"><a href="{{ route('articles.index') }}" class="nav-link">Articles</a></li>
                    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users</a></li>
                </ul>
            </aside>

            <main class="col-md-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
