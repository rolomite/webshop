@props(['disabled' => false, 'label' => null, 'suffix' => null, 'prefix' => null])

@php
    $id = $attributes->get('id') ?? \Illuminate\Support\Str::uuid();
    $value = old($attributes->get('name')) ?? $attributes->get('value');
@endphp

<div x-data="{ preview: @js($value) }">
    <!-- Label -->
    <x-input-label for="{{ $id }}">
        <span class="block">{{ $label }}</span>
        <!-- Image Preview -->
        <template x-if="preview">
            <img :src="preview" alt="Image Preview" class="block w-32 h-32 mb-2 object-cover rounded-lg" />
        </template>
    </x-input-label>

    <!-- File Input -->
    <div class="relative">
        <!-- File Input Field -->
        <input
            type="file"
            id="{{ $id }}"
            {{$attributes->class([
                "block w-full text-sm text-gray-500
                file:me-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-neutral-600 file:text-white
                hover:file:bg-blue-700
                file:disabled:opacity-50 file:disabled:pointer-events-none
                dark:text-transparent
                dark:file:bg-neutral-500
                dark:hover:file:bg-blue-400"
            ])}}
            x-on:change="
                const reader = new FileReader();
                reader.onload = (e) => preview = e.target.result;
                if ($event.target.files.length > 0) {
                    reader.readAsDataURL($event.target.files[0]);
                } else {
                    preview = null;
                }
            "
            @disabled($disabled)
        >

        <!-- Prefix -->
        @if ($prefix)
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                {{ $prefix }}
            </div>
        @endif

        <!-- Suffix -->
        @if ($suffix)
            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                {{ $suffix }}
            </div>
        @endif
    </div>

    <!-- Validation Error -->
    <x-input-error :messages="$errors->get($attributes->get('name'))" />
</div>
