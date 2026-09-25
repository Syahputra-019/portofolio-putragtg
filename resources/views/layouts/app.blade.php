<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Nama Kamu') — Portfolio</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-ink text-paper font-sans antialiased">

    <div class="pointer-events-none fixed inset-0 -z-10"
        style="opacity:0.06; background-image: linear-gradient(#5EEAD4 1px, transparent 1px), linear-gradient(90deg, #5EEAD4 1px, transparent 1px); background-size: 48px 48px;">
    </div>

    <header>
        <nav x-data="{ open: false }"
            class="relative mx-auto flex max-w-5xl items-center justify-between px-6 py-6 md:px-12">
            <a href="{{ route('home') }}"
                class="text-cyan border-line rounded border px-2 py-1 font-mono text-sm">NK.</a>

            <button @click="open = !open" class="text-paper md:hidden" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="text-muted hidden gap-8 font-mono text-xs tracking-wide md:flex">
                <a href="{{ route('home') }}#about" class="hover:text-cyan transition">tentang</a>
                <a href="{{ route('projects.index') }}" class="hover:text-cyan transition">projek</a>
                <a href="{{ route('home') }}#contact" class="hover:text-cyan transition">kontak</a>
            </div>

            <div x-show="open" x-cloak @click="open = false"
                class="bg-panel border-line absolute left-0 right-0 top-full z-20 flex flex-col gap-4 border-t p-6 font-mono text-sm md:hidden">
                <a href="{{ route('home') }}#about">tentang</a>
                <a href="{{ route('projects.index') }}">projek</a>
                <a href="{{ route('home') }}#contact">kontak</a>
            </div>
        </nav>
    </header>

    <main class="relative">
        @yield('content')
    </main>

    <footer class="border-line relative mt-24 border-t">
        <div
            class="text-muted mx-auto flex max-w-5xl flex-col items-center justify-between gap-4 px-6 py-8 font-mono text-xs md:flex-row md:px-12">
            <span>&copy; {{ date('Y') }} Nama Kamu</span>
            <span>dibangun pakai Laravel &amp; Tailwind</span>
        </div>
    </footer>

</body>

</html>
