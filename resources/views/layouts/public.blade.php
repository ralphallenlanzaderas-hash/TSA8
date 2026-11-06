<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'POS Application') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
    <header class="bg-white shadow-sm">
        <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-6 py-4">
            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-700">POS Application</a>
            <div class="flex flex-wrap items-center gap-5 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-indigo-700">Home</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-700">About</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-indigo-700">Dashboard</a>
                    <a href="{{ route('customers.index') }}" class="hover:text-indigo-700">Customers</a>
                    <a href="{{ route('users.index') }}" class="hover:text-indigo-700">Users</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="hover:text-indigo-700" type="submit">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-700">Log in</a>
                    <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">Register</a>
                @endauth
            </div>
        </nav>
    </header>
    <main class="mx-auto max-w-7xl px-6 py-12">
        @yield('content')
    </main>
    <footer class="border-t bg-white py-6 text-center text-sm text-slate-500">
        Point of Sale application
    </footer>
</body>
</html>
