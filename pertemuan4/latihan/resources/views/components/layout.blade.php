<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* If no Vite build available, fall back to compiled CSS for dev */
            </style>
        @endif
    </head>

    <body class="min-h-screen bg-white text-gray-900">
        <header class="border-b border-transparent bg-gradient-to-r from-purple-600 to-purple-500 text-white">
            <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
                {{-- <a href="/" class="flex items-center gap-3 text-lg font-semibold text-white">
                    <svg class="w-6 h-6 text-[#F53003]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M3 12l6-9 6 9 6-9v18H3V12z" />
                    </svg>
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a> --}}

                <nav class="hidden sm:flex items-center gap-3 text-sm">
                    <a href="/home" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Home</a>
                    <a href="/posts" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Posts</a>
                    <a href="/categories" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Categories</a>
                    <a href="/about" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">About</a>
                    <a href="/admin" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Admin</a>

                    @auth
                        <div class="flex items-center gap-3 ml-4">
                            <div class="w-8 h-8 rounded-full bg-white text-purple-600 flex items-center justify-center font-semibold">{{ strtoupper(substr(auth()->user()->name,0,1) ?? 'U') }}</div>
                            <div class="text-sm">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="text-xs opacity-80">@if(auth()->user()->is_admin) Admin @else User @endif</div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="ml-3">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-sm rounded bg-white text-purple-600">Logout</button>
                            </form>
                        </div>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Login</a>
                        <a href="{{ route('register') }}" class="px-3 py-2 rounded-sm hover:bg-purple-700/60">Register</a>
                    @endguest
                </nav>

                <div class="sm:hidden"> <!-- mobile menu placeholder -->
                    <a href="/posts" class="px-3 py-2 rounded-sm">Posts</a>
                </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-6 py-10">
            <div class="bg-white rounded-lg p-6 shadow">
                <h1 class="text-2xl font-semibold mb-4 text-gray-900">{{ $title ?? 'Page' }}</h1>
                <div class="space-y-4 text-gray-800">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <footer class="mt-auto text-center text-xs text-white py-6 bg-gradient-to-r from-purple-600 to-purple-500">
            © 2025 Praktikum Web - Mal Ghifari97
        </footer>
    </body>
</html>