<x-admin-layout>
    <x-slot:header class="flex justify-between items-center">
        <h1 class="dark:text-white text-lg font-bold">{{$product->project_name}}</h1>
        <form action="{{ route('admin.products.destroy', $product) }}" method="post" onsubmit="return confirm('Are you sure to delete this ?')">
            @csrf
            @method('DELETE')
            <button class="cursor-pointer py-2 px-4 inline-flex items-center gap-x-1 font-medium rounded-lg border border-transparent text-red-500 hover:text-neutral-200 hover:bg-red-100 focus:outline-none focus:bg-red-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-red-700 dark:focus:bg-red-700">
                <x-lucide-trash class="size-4" />
                Delete
            </button>
        </form>
    </x-slot:header>

    <section>
        <x-forms.product-form :product="$product"/>
    </section>
</x-admin-layout>
