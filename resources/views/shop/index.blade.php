<x-app-layout>
    <div class="max-w-6xl mx-auto ">
        <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </div>
                <div class="ms-2">
                    <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                        File has been successfully uploaded.
                    </h3>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50" data-hs-remove-element="#dismiss-alert">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-10 px-5 gap-x-5 gap-y-10  max-md:space-y-4 lg:grid grid-cols-4">
            @forelse ($products as $product)
            <x-product-card :product="$product">
                <x-slot:actions>
                    <div class="flex items-center gap-2 z-20">
                        <a href="#" class="flex-1 py-3 px-4 inline-flex items-center justify-between gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:text-teal-500 dark:bg-teal-800/30 dark:hover:bg-teal-800/20 dark:focus:bg-teal-800/20">
                            Preview <x-lucide-external-link class="size-4" />
                        </a>
                        <button x-on:click="addToCart({{$product->toJSON()}})" class="flex justify-center items-center size-[46px] text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                            <x-lucide-shopping-cart class="size-4" />
                        </button>
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
    </div>
</x-app-layout>