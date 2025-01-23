<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HohoClone</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f0f8ff;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            min-height: 100vh;
        }

        header {
            background-color: #1DA1F2;
            color: white;
            width: 100%;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            font-size: 1rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #d1e8ff;
        }

        .hero {
            text-align: center;
            padding: 4rem 2rem;
        }

        .hero h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1DA1F2;
        }

        .hero p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 2rem;
        }

        .hero a {
            display: inline-block;
            background-color: #1DA1F2;
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .hero a:hover {
            background-color: #1484c5;
        }

        footer {
            background-color: #f0f8ff;
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            border-top: 1px solid #e0e0e0;
        }

        footer a {
            color: #1DA1F2;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <h1>HohoClone</h1>
    @if (Route::has('login'))
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sign up</a>
                @endif
            @endauth
        </nav>
    @endif
</header>

<div class="hero">
    <h2>Welcome to HohoClone</h2>
    <p>Join the conversation and connect with the world in real-time.</p>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">Sign up now</a>
    @endif
</div>

<footer>
    <p>© {{ date('Y') }} HohoClone. All rights reserved.</p>
    <p>using <a href="https://laravel.com" target="_blank">Laravel</a>.</p>
</footer>
</body>
</html>
