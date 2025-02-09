@props(['variant' => 'solid', 'size' => 'default', 'color' => 'primary', 'tooltip' => false, 'tooltipPosition' => 'top'])

@php
    $baseClasses = "inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border focus:outline-none disabled:opacity-50 disabled:pointer-events-none";

    $variantClasses = [
        'solid' => [
            'primary' => "border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:bg-blue-700",
            'secondary' => "border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:bg-gray-600",
            'danger' => "border-transparent bg-red-500 text-white hover:bg-red-600 focus:bg-red-600",
        ],
        'outline' => [
            'primary' => "border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:border-blue-500 focus:text-blue-500 dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400",
            'secondary' => "border border-gray-500 text-gray-500 hover:border-gray-800 hover:text-gray-800 focus:border-gray-800 focus:text-gray-800 dark:border-neutral-400 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hover:border-neutral-300",
            'danger' => "border border-red-500 text-red-500 hover:border-red-800 hover:text-red-800 focus:border-red-800 focus:text-red-800 dark:border-neutral-400 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hover:border-neutral-300",
        ],
        'ghost' => [
            'primary' => "border-transparent text-blue-600 hover:bg-blue-100 focus:bg-blue-100 hover:text-blue-800 focus:text-blue-800 dark:text-blue-500 dark:hover:bg-blue-800/30 dark:hover:text-blue-400 dark:focus:bg-blue-800/30 dark:focus:text-blue-400",
            'secondary' => "border-transparent text-gray-500 hover:bg-gray-100 focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
            'danger' => "border-transparent text-red-500 hover:bg-red-100 focus:bg-red-100 dark:text-red-400 dark:hover:bg-red-800 dark:focus:bg-red-800",
        ],
        'soft' => [
            'primary' => "border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 focus:bg-blue-200 dark:text-blue-400 dark:bg-blue-800/30 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20",
            'secondary' => "border-transparent bg-gray-100 text-gray-500 hover:bg-gray-200 focus:bg-gray-200 dark:bg-white/10 dark:text-neutral-400 dark:hover:bg-white/20 dark:hover:text-neutral-300 dark:focus:bg-white/20 dark:focus:text-neutral-300",
            'danger' => "border border-transparent text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100 hover:text-red-800 disabled:opacity-50 dark:hover:bg-red-800/30 dark:hover:text-red-400 dark:focus:bg-red-800/30 dark:focus:text-red-400",
        ],
        'link' => [
            'primary' => "border-transparent text-blue-600 hover:text-blue-800 focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400",
            'secondary' => "border-transparent text-blue-600 hover:text-gray-800 focus:text-gray-800 dark:text-gray-500 dark:hover:text-gray-400 dark:focus:text-gray-400",
            'danger' => "border-transparent text-red-600 hover:text-red-800 focus:text-red-800 dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400",
        ],
    ];

    $sizeClasses = [
        'default' => 'py-3 px-4',
        'xs' => 'py-1 px-2',
        'sm' => 'py-2 px-3',
        'lg' => 'p-4 sm:p-5',
    ];

    $classes = implode(' ', [$baseClasses, $variantClasses[$variant][$color] ?? '', $sizeClasses[$size] ?? '', $tooltip ? 'hs-tooltip-toggle' : '']);
@endphp

@if($tooltip)
    <div @class([
    "hs-tooltip inline-block",
    match ($tooltipPosition){
        'left' => '[--placement:left]',
        'right' => '[--placement:right]',
        'bottom' => '[--placement:bottom]',
        default => '[--placement:top]',
    }
])>
@endif

@if($attributes->has('href'))
    <a {{ $attributes->class($classes) }}>
        {{ $slot }}
        @if($tooltip)
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
              {{ is_string($tooltip) ? $tooltip : $attributes->get('title') }}
            </span>
        @endif
    </a>
@else
    <button {{ $attributes->class($classes)}}>
        {{ $slot }}
        @if($tooltip)
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
              {{ is_string($tooltip) ? $tooltip : $attributes->get('title') }}
            </span>
        @endif
    </button>
@endif

@if($tooltip)
    </div>
@endif
