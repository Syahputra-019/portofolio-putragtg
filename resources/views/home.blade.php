@extends('layouts.app')

@section('content')

    {{-- Blade comment kayak gini gak pernah muncul di HTML akhir, beda dari <!-- --> biasa --}}

    {{-- Hero --}}
    <section class="max-w-5xl mx-auto px-6 md:px-12 pt-12 pb-20">
        <div class="relative border border-dashed border-line rounded-xl p-8 md:p-12">
            <span class="absolute -top-px -left-px w-5 h-5 border-t-2 border-l-2 border-cyan"></span>
            <span class="absolute -top-px -right-px w-5 h-5 border-t-2 border-r-2 border-cyan"></span>
            <span class="absolute -bottom-px -left-px w-5 h-5 border-b-2 border-l-2 border-cyan"></span>
            <span class="absolute -bottom-px -right-px w-5 h-5 border-b-2 border-r-2 border-cyan"></span>

            <p class="font-mono text-xs text-cyan tracking-wider">// {{ $profile->headline }}</p>
            <h1 class="text-4xl md:text-6xl font-bold mt-4 tracking-tight">{{ $profile->name }}</h1>

            <div class="flex flex-wrap gap-4 mt-8">
                <a href="{{ route('projects.index') }}" class="bg-cyan text-ink px-6 py-3 rounded-lg font-medium hover:bg-cyan/90 transition">Lihat Projek</a>
                @if ($profile->resume_url)
                    <a href="{{ $profile->resume_url }}" target="_blank" class="border border-line px-6 py-3 rounded-lg hover:border-cyan/50 transition">Download CV</a>
                @endif
            </div>

            @if ($profile->social_links)
                <div class="flex gap-6 mt-8 font-mono text-xs">
                    @if (isset($profile->social_links['github']))
                        <a href="{{ $profile->social_links['github'] }}" target="_blank" class="text-muted hover:text-cyan transition">GitHub →</a>
                    @endif
                    @if (isset($profile->social_links['linkedin']))
                        <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="text-muted hover:text-cyan transition">LinkedIn →</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="max-w-5xl mx-auto px-6 md:px-12 pb-20">
        <p class="font-mono text-xs text-cyan tracking-wider">// tentang</p>
        <div class="grid md:grid-cols-3 gap-8 mt-6">
            <p class="md:col-span-2 text-muted leading-relaxed">{{ $profile->bio }}</p>
            @if ($profile->location)
                <div class="font-mono text-xs text-muted">
                    <span class="text-cyan">lokasi</span><br>
                    {{ $profile->location }}
                </div>
            @endif
        </div>
    </section>

    {{-- Skills --}}
    <section class="max-w-5xl mx-auto px-6 md:px-12 pb-20">
        <p class="font-mono text-xs text-cyan tracking-wider">// skills</p>
        <div class="grid md:grid-cols-2 gap-8 mt-6">
            @foreach ($skills as $category => $categorySkills)
                <div>
                    <h3 class="font-mono text-xs text-muted uppercase tracking-wider mb-3">{{ $category }}</h3>
                    <div class="space-y-3">
                        @foreach ($categorySkills as $skill)
                            <div class="bg-panel border border-line rounded-lg px-4 py-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">{{ $skill->name }}</span>
                                    <span class="font-mono text-xs text-muted">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="h-1 bg-line rounded-full mt-2 overflow-hidden">
                                    <div class="h-full bg-cyan rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Featured Projects --}}
    <section class="max-w-5xl mx-auto px-6 md:px-12 pb-20">
        <p class="font-mono text-xs text-cyan tracking-wider">// projek unggulan</p>
        <div class="grid md:grid-cols-2 gap-6 mt-6">
            @foreach ($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </section>

@endsection