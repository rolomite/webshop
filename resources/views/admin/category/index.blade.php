<x-admin-layout>
    <x-slot:header class="flex justify-between items-center">
        <h1 class="dark:text-white text-lg font-bold">Categories</h1>
        <x-button href="{{ route('admin.categories.create') }}" size="sm" variant="solid" color="primary">
            <div><x-lucide-plus-circle class="size-4" /></div>
            <div>New Category</div>
        </x-button>
    </x-slot:header>
    <x-table>
        <x-slot:title>Categories</x-slot:title>
        <x-slot:description>List of all categories in store</x-slot:description>
        <x-table.header>
            <x-table.heading>ID</x-table.heading>
            <x-table.heading class="w-full" >Name</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-table.header>
        <x-table.body>
            @forelse($categories as $key => $category)
            <x-table.row>
                <x-table.cell>{{ $key + 1 }}</x-table.cell>
                <x-table.cell>{{ $category->name }}</x-table.cell>
                <x-table.cell class="flex items-center gap-5">
                    <x-button href="{{ route('admin.categories.edit', $category->id) }}" size="sm" variant="ghost" color="primary">
                        <x-lucide-pencil-line class="size-4" />
                        Edit
                    </x-button>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button size="sm" variant="ghost" color="danger"><x-lucide-trash-2 class="size-4"></x-lucide-trash-2>Delete</x-button>
                    </form>
                </x-table.cell>
            </x-table.row>
            @empty
            <x-table.row>
                <x-table.cell class="text-center" colspan="3">No category has been added to store</x-table.cell>
            </x-table.row>
            @endforelse
        </x-table.body>
    </x-table>
</x-admin-layout>