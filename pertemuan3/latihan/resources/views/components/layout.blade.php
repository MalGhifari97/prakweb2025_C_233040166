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

    <body class="min-h-screen bg-[#FDFDFC] dark:bg-[#0a0a0a] text-white">
        <header class="border-b border-transparent dark:border-[#222]">
            <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between gap-4">
                {{-- <a href="/" class="flex items-center gap-3 text-lg font-semibold text-white">
                    <svg class="w-6 h-6 text-[#F53003]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M3 12l6-9 6 9 6-9v18H3V12z" />
                    </svg>
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a> --}}

                <nav class="hidden sm:flex items-center gap-3 text-sm">
                    <a href="/home" class="px-3 py-2 rounded-sm hover:bg-[#f3f3f3] dark:hover:bg-[#111]">Home</a>
                    <a href="/posts" class="px-3 py-2 rounded-sm hover:bg-[#f3f3f3] dark:hover:bg-[#111]">Posts</a>
                    <a href="/categories" class="px-3 py-2 rounded-sm hover:bg-[#f3f3f3] dark:hover:bg-[#111]">Categories</a>
                    <a href="/about" class="px-3 py-2 rounded-sm hover:bg-[#f3f3f3] dark:hover:bg-[#111]">About</a>
                </nav>

                <div class="sm:hidden"> <!-- mobile menu placeholder -->
                    <a href="/posts" class="px-3 py-2 rounded-sm">Posts</a>
                </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-6 py-10">
            <div class="bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.03)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-4">{{ $title ?? 'Page' }}</h1>
                <div class="space-y-4">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <footer class="mt-auto text-center text-xs text-white/70 py-6">
            © 2025 Praktikum Web - Mal Ghifari97
        </footer>
    </body>
</html>