@props(['resources'])

@isset($resources)
<p class="m-0 text-muted">
    Showing
    {{ $resources->firstItem() }} to
    {{ $resources->lastItem() }} of total
    {{ $resources->total() }} entries
</p>
<ul class="pagination m-0 ms-auto">
    {{ $resources->links(data: ['scrollTo' => false]) }}
</ul>
@endisset