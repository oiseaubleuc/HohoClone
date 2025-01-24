<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Clone</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-100 font-sans">
<div class="flex">
    <!-- Sidebar -->
    <div class="w-1/4 bg-gray-900 text-white h-screen sticky top-0 p-6">
        <ul class="space-y-6">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:text-blue-400">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="/notifications" class="flex items-center space-x-2 hover:text-blue-400">
                    <i class="bi bi-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="{{ route('messages') }}" class="flex items-center space-x-2 hover:text-blue-400">
                    <i class="bi bi-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.show') }}" class="flex items-center space-x-2 hover:text-blue-400">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>
        <button class="mt-6 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
            Tweet
        </button>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</div>
</body>
</html>
