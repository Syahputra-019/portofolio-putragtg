@extends('layouts.app')

@section('content')
    <section class="max-w-5xl mx-auto px-6 md:px-12 py-20">
        <p class="font-mono text-cyan text-sm">// project card component</p>
        <h1 class="text-3xl md:text-4xl font-bold mt-4">Testing project card</h1>
        <p class="text-muted mt-4">Halaman home beneran nyusul — ini masih buat ngetes komponen card-nya aja.</p>

        <div class="grid md:grid-cols-2 gap-6 mt-10">
            @foreach ($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </section>
@endsection