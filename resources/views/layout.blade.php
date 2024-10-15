<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
</head>

<body>
    <nav>
        <div class="logo">
            <a href="/">Journaling</a>
        </div>
        @if (session()->has('success'))
            <div>
                {{ session()->get('success') }} {{ Auth::user()->name }}
            </div>
        @endif
        <ul>
            @guest()
                <li><a href="{{ route('profile.create') }}">Register</a></li>
                <li><a href="{{ route('profile.loginForm') }}">Login</a></li>
            @endguest
            <li><a href="{{ route('journals.index') }}">Journals</a></li>
            @auth()
                <li><a href="{{ route('journals.create') }}">Add Journal</a></li>
            @endauth
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @auth
                <li><a href="{{ route('profile.logout') }}">Logout</a></li>
            @endauth
        </ul>
    </nav>
    @yield('content')
</body>

</html>
