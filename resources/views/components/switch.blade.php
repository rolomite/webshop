@props(['label' => null, 'checked' => false])

@php
$id = $attributes->get('id') ?? \Illuminate\Support\Str::random();
@endphp

<div class="flex items-center">
    <input {{ $attributes->merge(['type' => 'checkbox', 'id' => $id, 'checked' => $checked, 'class' => "relative w-11 h-6 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-5 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200"]) }}/>
    <label for="hs-small-switch" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">
        {{$label}}
    </label>
</div>
