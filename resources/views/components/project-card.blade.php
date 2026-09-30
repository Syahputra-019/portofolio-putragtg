@props(['project'])

<div
    x-data="tiltCard"
    @mousemove="tilt($event)"
    @mouseleave="reset()"
    :style="`transform: perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`"
    class="relative bg-panel border border-line rounded-xl p-6 transition-transform duration-150 ease-out"
>
    <span class="absolute -top-px -left-px w-4 h-4 border-t-2 border-l-2 border-amber"></span>
    <span class="absolute -top-px -right-px w-4 h-4 border-t-2 border-r-2 border-amber"></span>
    <span class="absolute -bottom-px -left-px w-4 h-4 border-b-2 border-l-2 border-amber"></span>
    <span class="absolute -bottom-px -right-px w-4 h-4 border-b-2 border-r-2 border-amber"></span>

    @if ($project->is_featured)
        <span class="font-mono text-xs text-amber tracking-wider">FEATURED</span>
    @endif

    <h3 class="text-xl font-semibold mt-2">{{ $project->title }}</h3>
    <p class="text-muted text-sm mt-2 leading-relaxed">{{ $project->description }}</p>

    <div class="flex flex-wrap gap-2 mt-4">
        @foreach ($project->skills as $skill)
            <span class="font-mono text-xs bg-line/40 text-cyan px-2 py-1 rounded">{{ $skill->name }}</span>
        @endforeach
    </div>

    <a href="{{ route('projects.show', $project) }}" class="inline-block mt-4 font-mono text-xs text-cyan hover:underline">
        lihat detail →
    </a>
</div>