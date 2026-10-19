@if ($paginator->hasPages())
    <nav class="flex items-center justify-between font-mono text-xs" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="text-line">← sebelumnya</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-cyan hover:underline">← sebelumnya</a>
        @endif

        <span class="text-muted">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-cyan hover:underline">berikutnya →</a>
        @else
            <span class="text-line">berikutnya →</span>
        @endif
    </nav>
@endif