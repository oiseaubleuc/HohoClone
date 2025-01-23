<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="mb-4">
            <i class="bi bi-twitter"></i>
        </a>
        <a href="{{ route('dashboard') }}" class="active">
            <i class="bi bi-house-door-fill"></i> Home
        </a>
        <a href="#">
            <i class="bi bi-search"></i> Search
        </a>
        <a href="#">
            <i class="bi bi-bell"></i> Notifications
        </a>
        <a href="#">
            <i class="bi bi-envelope"></i> mess
        </a>
        <a href="#">
            <i class="bi bi-bookmark"></i> Bookmarks
        </a>
        <a href="{{ route('profile.edit') }}">
            <i class="bi bi-people"></i> settings
        </a>
        <a href="{{ route('profile.show') }}">
            <i class="bi bi-person"></i> Profile
        </a>
        <button class="btn btn-primary mt-4 w-100">Tweets</button>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</div>
</body>
</html>
