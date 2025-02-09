@props(['disabled' => false, 'label' => null, 'suffix' => null, 'prefix' => null, 'files' => []])

@php
    $id = $attributes->get('id') ?? \Illuminate\Support\Str::uuid();
    $value = old($attributes->get('name')) ?? $attributes->get('value');
@endphp

<div x-data="{ preview: @js($value), files: @js($files), previews: [] }">
    <!-- Label -->
    <div>
        <!-- Image Preview -->
        <div class="flex flex-wrap gap-2 items-center">
            <template x-for="(file, index) in files">
                <div class="relative">
                    <input type="image" name="{{ $attributes->get('name') }}" :value="file" :src="file" class="block w-32 h-32 mb-2 object-cover rounded-lg"  alt="No image"/>
                    <input type="hidden" name="old_{{ $attributes->get('name') }}" :value="file"/>
                    <x-button type="button" variant="soft" color="danger" size="sm" class="absolute top-0 right-0" @click="files.splice(index, 1)">
                        <x-lucide-x-circle class="size-3"/>
                    </x-button>
                </div>
            </template>
            <template x-for="(file, index) in previews">
                <div class="relative">
                    <input type="image" name="{{ $attributes->get('name') }}" :src="file" class="block w-32 h-32 mb-2 object-cover rounded-lg"  alt="No image"/>
                    <x-button type="button" variant="soft" color="danger" size="sm" class="absolute top-0 right-0" @click="previews.splice(index, 1)">
                        <x-lucide-x-circle class="size-3"/>
                    </x-button>
                </div>
            </template>
            <x-input-label for="{{ $id }}">
                <span class="w-32 h-32 mb-2 object-cover rounded-lg border border-dashed border-neutral-500 grid place-items-center text-neutral-500">
                    <span>
                        <x-lucide-images class="size-6 text-inherit mx-auto mb-1"/>
                        <span class="block text-xs">{{ $label }}</span>
                    </span>
                </span>
            </x-input-label>
        </div>
    </div>

    <!-- File Input -->
    <div class="relative">
        <!-- File Input Field -->
        <input
            type="file"
            id="{{ $id }}"
            {{$attributes->class([
                "hidden w-full text-sm text-gray-500
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
                previews = [];
                for(let i = 0; i < $event.target.files.length; i++){
                    const reader = new FileReader();
                    reader.onload = (e) => previews.push(e.target.result);
                    reader.readAsDataURL($event.target.files[i])
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
    <x-input-error :messages="$attributes->get('errors') ?? $errors->get($attributes->get('name'))" />
</div>
