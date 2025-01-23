<x-app-layout>
    <div class="max-w-6xl mx-auto my-10 space-y-4 lg:grid grid-cols-3">
        @forelse ($products as $product)
            <x-product-card :product="$product">
                <x-slot:actions>
                    <div class="flex items-center gap-2">
                        <a href="#" class="flex-1 py-3 px-4 inline-flex items-center justify-between gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:text-teal-500 dark:bg-teal-800/30 dark:hover:bg-teal-800/20 dark:focus:bg-teal-800/20">
                            Preview <x-lucide-external-link class="size-4"/>
                        </a>
                        <a href="#" class="flex justify-center items-center size-[46px] text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            <x-lucide-shopping-cart class="size-4"/>
                        </a>
                        <a href="#" class="flex justify-center items-center size-[46px] text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            <x-lucide-message-circle class="size-4" />
                        </a>
                    </div>
                </x-slot:actions>
            </x-product-card>
        @empty
            <p class="dark:text-neutral-500 text-center font-medium text-sm mt-24 lg:mt-32">No products to display</p>
        @endforelse
    </div>
</x-app-layout>
