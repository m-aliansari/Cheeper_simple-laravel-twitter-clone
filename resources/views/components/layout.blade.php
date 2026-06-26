<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Home' }} - Cheeper</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    {{-- Apply saved theme before paint to avoid a flash of the wrong theme. No saved value falls back to system preference. --}}
    <script>
        (function () {
            const stored = localStorage.getItem('theme');
            if (stored) {
                document.documentElement.setAttribute('data-theme', stored);
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">Cheeper</a>
        </div>
        <div class="navbar-end gap-2">
            <label class="swap swap-rotate btn btn-ghost btn-sm btn-circle" aria-label="Toggle dark mode">
                <input type="checkbox" id="theme-toggle" />
                {{-- Sun shows in light mode --}}
                <svg class="swap-off h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2ZM10 15a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15ZM10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6ZM15.657 5.404a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.061-1.06ZM6.464 14.596a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.061l1.061-1.061ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10ZM14.596 15.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.061ZM5.404 6.464a.75.75 0 0 0 1.06-1.06L5.404 4.343a.75.75 0 1 0-1.061 1.06l1.06 1.061Z" />
                </svg>
                {{-- Moon shows in dark mode --}}
                <svg class="swap-on h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M7.455 2.004a.75.75 0 0 1 .26.77 7 7 0 0 0 9.958 7.967.75.75 0 0 1 1.067.853A8.5 8.5 0 1 1 6.647 1.921a.75.75 0 0 1 .808.083Z" />
                </svg>
            </label>
            @auth
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-ghost btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
            @endauth
        </div>
    </nav>

    @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success animate-fade-out">
                <svg class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24" id="check-mark-circle"
                    xmlns="http://www.w3.org/2000/svg" class="icon line">
                    <path id="primary"
                        d="M12,21h0a9,9,0,0,1-9-9H3a9,9,0,0,1,9-9h0a9,9,0,0,1,9,9h0A9,9,0,0,1,12,21ZM8,11.5l3,3,5-5"
                        style="fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.5;">
                    </path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>Copyright © 2026 - All rights reserved by Cheeper Inc.</p>
        </div>
    </footer>
</body>
