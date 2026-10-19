@extends('layouts.app')

@section('content')

    {{-- Blade comment kayak gini gak pernah muncul di HTML akhir, beda dari <!-- --> biasa --}}

    {{-- Hero --}}
    <section class="mx-auto max-w-5xl px-6 pb-20 pt-12 md:px-12">
        <div class="border-line relative rounded-xl border border-dashed p-8 md:p-12">
            <span class="border-cyan absolute -left-px -top-px h-5 w-5 border-l-2 border-t-2"></span>
            <span class="border-cyan absolute -right-px -top-px h-5 w-5 border-r-2 border-t-2"></span>
            <span class="border-cyan absolute -bottom-px -left-px h-5 w-5 border-b-2 border-l-2"></span>
            <span class="border-cyan absolute -bottom-px -right-px h-5 w-5 border-b-2 border-r-2"></span>

            <p class="text-cyan font-mono text-xs tracking-wider">// {{ $profile->headline }}</p>
            <h1 class="mt-4 text-4xl font-bold tracking-tight md:text-6xl">{{ $profile->name }}</h1>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('projects.index') }}"
                    class="bg-cyan text-ink hover:bg-cyan/90 rounded-lg px-6 py-3 font-medium transition">Lihat Projek</a>
                @if ($profile->resume_url)
                    <a href="{{ $profile->resume_url }}" target="_blank"
                        class="border-line hover:border-cyan/50 rounded-lg border px-6 py-3 transition">Download CV</a>
                @endif
            </div>

            @if ($profile->social_links)
                <div class="mt-8 flex gap-6 font-mono text-xs">
                    @if (isset($profile->social_links['github']))
                        <a href="{{ $profile->social_links['github'] }}" target="_blank"
                            class="text-muted hover:text-cyan transition">GitHub →</a>
                    @endif
                    @if (isset($profile->social_links['linkedin']))
                        <a href="{{ $profile->social_links['linkedin'] }}" target="_blank"
                            class="text-muted hover:text-cyan transition">LinkedIn →</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="mx-auto max-w-5xl px-6 pb-20 md:px-12">
        <p class="text-cyan font-mono text-xs tracking-wider">// tentang</p>
        <div class="mt-6 grid gap-8 md:grid-cols-3">
            <p class="text-muted leading-relaxed md:col-span-2">{{ $profile->bio }}</p>
            @if ($profile->location)
                <div class="text-muted font-mono text-xs">
                    <span class="text-cyan">lokasi</span><br>
                    {{ $profile->location }}
                </div>
            @endif
        </div>
    </section>

    {{-- Skills --}}
    <section class="mx-auto max-w-5xl px-6 pb-20 md:px-12">
        <p class="text-cyan font-mono text-xs tracking-wider">// skills</p>
        <div class="mt-6 grid gap-8 md:grid-cols-2">
            @foreach ($skills as $category => $categorySkills)
                <div>
                    <h3 class="text-muted mb-3 font-mono text-xs uppercase tracking-wider">{{ $category }}</h3>
                    <div class="space-y-3">
                        @foreach ($categorySkills as $skill)
                            <div class="bg-panel border-line rounded-lg border px-4 py-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">{{ $skill->name }}</span>
                                    <span class="text-muted font-mono text-xs">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="bg-line mt-2 h-1 overflow-hidden rounded-full">
                                    <div class="bg-cyan h-full rounded-full" style="width: {{ $skill->proficiency }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Experience & Pendidikan --}}
    <section class="mx-auto max-w-5xl px-6 pb-20 md:px-12">
        <p class="text-cyan font-mono text-xs tracking-wider">// pengalaman & pendidikan</p>
        <div class="relative mt-8 space-y-10">
            <div class="bg-line absolute bottom-2 left-0 top-2 w-px"></div>
            @foreach ($experiences as $experience)
                <div class="relative pl-8">
                    <span class="bg-cyan absolute left-0 top-1.5 h-2.5 w-2.5 -translate-x-1/2 rounded-full"></span>

                    <span class="text-amber font-mono text-xs uppercase tracking-wider">{{ $experience->type }}</span>
                    <h3 class="mt-1 text-lg font-semibold">{{ $experience->title }}</h3>
                    <p class="text-muted text-sm">{{ $experience->institution }}</p>
                    <p class="text-muted mt-1 font-mono text-xs">
                        {{ $experience->start_date->locale('id')->translatedFormat('M Y') }}
                        —
                        {{ $experience->end_date ? $experience->end_date->locale('id')->translatedFormat('M Y') : 'Sekarang' }}
                    </p>
                    @if ($experience->description)
                        <p class="text-muted mt-2 text-sm leading-relaxed">{{ $experience->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    {{-- Featured Projects --}}
    <section class="mx-auto max-w-5xl px-6 pb-20 md:px-12">
        <p class="text-cyan font-mono text-xs tracking-wider">// projek unggulan</p>
        <div class="mt-6 grid gap-6 md:grid-cols-2">
            @foreach ($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="mx-auto max-w-5xl px-6 pb-24 md:px-12">
        <p class="text-cyan font-mono text-xs tracking-wider">// kontak</p>
        <h2 class="mt-2 text-2xl font-bold">Ada projek atau kolaborasi?</h2>

        @if (session('success'))
            <div class="bg-cyan/10 border-cyan text-cyan mt-6 rounded-lg border px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="mt-8 max-w-lg space-y-4">
            @csrf

            <div>
                <label class="text-muted font-mono text-xs">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="bg-panel border-line focus:border-cyan mt-1 w-full rounded-lg border px-4 py-3 text-sm focus:outline-none">
                @error('name')
                    <p class="text-amber mt-1 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-muted font-mono text-xs">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="bg-panel border-line focus:border-cyan mt-1 w-full rounded-lg border px-4 py-3 text-sm focus:outline-none">
                @error('email')
                    <p class="text-amber mt-1 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-muted font-mono text-xs">Pesan</label>
                <textarea name="message" rows="4"
                    class="bg-panel border-line focus:border-cyan mt-1 w-full rounded-lg border px-4 py-3 text-sm focus:outline-none">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-amber mt-1 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-cyan text-ink hover:bg-cyan/90 rounded-lg px-6 py-3 font-medium transition">Kirim Pesan</button>
        </form>
    </section>

@endsection
