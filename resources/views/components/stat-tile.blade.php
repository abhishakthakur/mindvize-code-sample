@props(['label', 'value', 'delta' => null, 'upIsGood' => true, 'sparkline' => null])

@php
    $isGood = $delta === null ? null : ($upIsGood ? $delta >= 0 : $delta < 0);
@endphp

<div class="bg-white overflow-hidden shadow-sm rounded-lg p-5">
    <div class="flex items-start justify-between gap-2">
        <div>
            <div class="text-sm text-gray-500">{{ $label }}</div>
            <div class="text-2xl font-semibold text-gray-900 mt-1">{{ $value }}</div>
        </div>

        @if ($delta !== null)
            <span @class([
                'inline-flex shrink-0 items-center gap-1 rounded-full px-2 py-1 text-xs font-medium',
                'bg-green-50 text-green-700' => $isGood,
                'bg-red-50 text-red-700' => ! $isGood,
            ])>
                <span aria-hidden="true">{{ $delta >= 0 ? '▲' : '▼' }}</span>
                {{ number_format(abs($delta), 1) }}%
            </span>
        @endif
    </div>

    @if ($sparkline)
        <div class="mt-3 h-10">
            <canvas data-sparkline="{{ json_encode($sparkline) }}"></canvas>
        </div>
    @endif
</div>
