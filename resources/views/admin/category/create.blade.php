<x-admin-layout>
<x-slot:header class="flex justify-between items-center">
        <h1 class="dark:text-white text-lg font-bold">Categories</h1>
        <x-button href="{{ route('admin.categories.index') }}" size="sm" variant="solid" color="primary">
            <div><x-lucide-arrow-left class="size-4" /></div>
            <div>Go back</div>
        </x-button>
    </x-slot:header>
    <x-forms.category-form/>
</x-admin-layout>