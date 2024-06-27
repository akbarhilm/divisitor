<div class="d-flex">
    <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
        @foreach ($path as $item)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (is_array($item))
                    <a style="color: inherit" href={{ $item['route'] }}>{{ $item['name'] }}</a>
                @else
                    {{ $item }}
                @endif
            </li>
        @endforeach
    </ol>
</div>
