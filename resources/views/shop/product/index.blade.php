<x-app-layout>
    <div class="max-w-6xl mx-auto">
        <x-blocks.banner/>
        <div class="my-10 gap-4 grid grid-cols-2 lg:grid-cols-4 md:grid-cols-3">
            @forelse ($products as $product)
                <x-product-card :product="$product"/>
            @empty
                <p class="dark:text-neutral-500 text-center font-medium text-sm mt-24 lg:mt-32">No products to display</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
