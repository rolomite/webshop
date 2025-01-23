@props(['value'])

<label {{ $attributes->merge(['class' => "block text-sm mb-1 dark:text-white empty:py-2.5"]) }}>{{ $value ?? $slot }}</label>
