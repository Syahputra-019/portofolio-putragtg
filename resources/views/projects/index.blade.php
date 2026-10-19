@extends('layouts.app')

@section('title', 'Projek')

@section('content')
    <section class="max-w-5xl mx-auto px-6 md:px-12 pt-12 pb-20">
        <p class="font-mono text-xs text-cyan tracking-wider">// semua projek</p>
        <h1 class="text-3xl md:text-4xl font-bold mt-2 tracking-tight">Projek</h1>

        <div class="grid md:grid-cols-2 gap-6 mt-10">
            @forelse ($projects as $project)
                <x-project-card :project="$project" />
            @empty
                <p class="text-muted md:col-span-2">Belum ada projek.</p>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $projects->links('pagination.simple') }}
        </div>
    </section>
@endsection