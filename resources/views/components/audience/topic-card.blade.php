@props([
    'title',
    'icon' => null,
])

<article class="topic-card">
    @if($icon)
        <div class="topic-card-head">
            <h3>{{ $title }}</h3>
            <i class="fas {{ $icon }}" aria-hidden="true"></i>
        </div>
    @else
        <h3>{{ $title }}</h3>
    @endif
    {{ $slot }}
</article>
