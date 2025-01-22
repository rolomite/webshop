<x-adminlayout>
    <div class="mt-10 mx-10 flex items-center justify-between">
        <h1 class="dark:text-white text-lg font-bold">Products</h1>
        <a href="{{ route('products.create') }}" 
           class="cursor-pointer py-3 px-4 inline-flex items-center gap-x-1 font-medium rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            Add a site
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </div>
    <div class="my-10 mx-10 space-y-10">
        @forelse ($products as $product)
            <x-admin-product-display 
                id="{{ $product->id }}" 
                title="{{ $product->project_name }}" 
                image="{{$product->image }}"
                description="{{ $product->description }}" 
                published_at="{{ $product->published_at }}" 
                price="{{ $product->price }}">
            </x-admin-product-display>
        @empty
            <p>No products to display</p>
        @endforelse
    </div>
</x-adminlayout>
