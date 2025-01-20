<nav class="bg-dark text-white px-4 py-2 shadow-md">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="text-light fw-bold d-flex align-items-center">
            <i class="bi bi-house-door-fill me-2"></i> Laravel
        </a>

        <!-- Links -->
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-light">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link text-light">Profile</a>
            </li>
        </ul>

        <!-- Auth -->
        <div>
            @auth
                <span class="me-4">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Register</a>
            @endauth
        </div>
    </div>
</nav>
