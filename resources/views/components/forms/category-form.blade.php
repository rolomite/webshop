@props(['category' => null])

<div class="w-full">
    <form action="{{$category? route('admin.categories.update', $category->id): route('admin.categories.store')}}" method="POST" class="w-full max-w-2xl grid lg:grid-cols-2 gap-4">
        @csrf
        @if ($category)
        @method('PUT')
        @endif

        <div class="col-span-full">
            <x-text-input name="name" label="Category Name" :value="$category?->name" placeholder="Men's collection" />
        </div>

        <x-primary-button class="col-span-full">
            {{ $category? 'Update Category': 'Save Category' }}
            <x-lucide-save class="size-4" />
        </x-primary-button>
    </form>
</div>