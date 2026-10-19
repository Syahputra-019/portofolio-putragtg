@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <article class="max-w-3xl mx-auto px-6 md:px-12 pt-12 pb-20">
        <a href="{{ route('projects.index') }}" class="font-mono text-xs text-muted hover:text-cyan transition">← semua projek</a>

        @if ($project->is_featured)
            <p class="font-mono text-xs text-amber tracking-wider mt-8">FEATURED</p>
        @endif
        <h1 class="text-3xl md:text-5xl font-bold tracking-tight mt-2">{{ $project->title }}</h1>

        @if ($project->thumbnail)
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full rounded-xl border border-line mt-8">
        @endif

        <p class="text-muted leading-relaxed mt-8 whitespace-pre-line">{{ $project->description }}</p>

        @if ($project->skills->isNotEmpty())
            <div class="mt-8">
                <h2 class="font-mono text-xs text-cyan tracking-wider">// tech stack</h2>
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach ($project->skills as $skill)
                        <span class="font-mono text-xs bg-line/40 text-cyan px-2 py-1 rounded">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($project->demo_url || $project->github_url)
            <div class="flex flex-wrap gap-4 mt-10">
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="bg-cyan text-ink px-6 py-3 rounded-lg font-medium hover:bg-cyan/90 transition">Lihat Demo</a>
                @endif
                @if ($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="border border-line px-6 py-3 rounded-lg hover:border-cyan/50 transition">Source Code</a>
                @endif
            </div>
        @endif
    </article>
@endsection