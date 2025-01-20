<nav class="bg-gray-900 text-white px-4 py-2 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="text-xl font-semibold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 3v18M15 3v18" />
            </svg>
            Laravel
        </a>

        <div class="space-x-4">
            <a href="{{ route('dashboard') }}" class="hover:text-blue-500">Home</a>
            <a href="{{ route('profile.edit') }}" class="hover:text-blue-500">Profile</a>
        </div>

        <div>
            @auth
                <span class="mr-4">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-500">Register</a>
            @endauth
        </div>
    </div>
</nav>
