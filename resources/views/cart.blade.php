<x-app-layout>
    <div x-show="alert" id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
        <div class="flex">
            <div class="shrink-0">
                <x-lucide-circle-check />
            </div>
            <div class="ms-2">
                <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                    {{session('success')}}
                </h3>
            </div>
            <div class="ps-3 ms-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50" data-hs-remove-element="#dismiss-alert">
                        <span class="sr-only">Dismiss</span>
                        <x-lucide-x />
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-5 flex flex-col bg-white border shadow-sm rounded-md dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <p class="mt-1 pb-5 border-b text-lg text-gray-500 dark:text-white">
            Cart (
            <span x-text="cart.count"></span>
            )
        </p>
        <div>
            <div x-show="cart.count === 0" class="tracking-wider text-center text-sm  space-y-4 my-5 text-gray-500 dark:text-neutral-400">
                <p class="font-bold text-lg">Your cart is empty!</p>
                <p> Browse our products for awesome deals!
                </p>
                <a href="/" class="inline-block bg-teal-800 px-5 py-3 rounded-md shadow">Continue shopping</a>
            </div>
            <template class="bg-red-500" x-for="item in cart" :key="item.id">
                <div class="py-3 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img x-text="item.image" src="" alt="">
                            <p x-text="item.name" class="mt-2 text-gray-500 dark:text-neutral-400">
                            </p>
                        </div>
                        <span x-currency:NGN="item.price"></span>
                    </div>
                    <div class="flex items-center justify-between"> <button @click="removeFromCart(item.id)" class="text-teal-400 flex items-center gap-x-2 text-sm"> Remove</button>
                    </div>
                </div>
            </template>
        </div>
        <div x-show="cart.count > 0">
            <div class="flex items-center justify-between border-t pt-5 mb-5">
                Total: <p><span class="ml-2" x-currency:NGN="total"></span></p>
            </div>
            <button @click="checkout()" class="w-full p-4 rounded-md bg-blue-500 inline-block text-center">checkout</button>
        </div>
    </div>
</x-app-layout>