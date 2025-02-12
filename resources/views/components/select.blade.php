@props(['disabled' => false, 'label' => null, 'options' => []])

@php
$id = $attributes->get('id') ?? \Illuminate\Support\Str::uuid();
$value = old($attributes->get('name')) ?? $attributes->get('value');
@endphp

<div>
    <x-input-label for="{{$id}}">{{$label}}</x-input-label>
    <select @disabled($disabled) {{ $attributes->merge(['id' => $id, 'class' => "py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"]) }}>
        <option value="">Select an option</option>
        @foreach($options as $key => $option)
        <option value="{{$option}}" @selected($option===$value)>{{ $key }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get($attributes->get('name'))" />
</div>