<x-app-layout>
<div class="grid lg:grid-cols-12 gap-4 items-start" x-data>
    <section class="w-full lg:col-span-8 px-2 flex flex-col bg-white border shadow-sm rounded-md dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <header class="flex justify-between items-center py-2 dark:text-white">
            <h4 class="text-lg font-bold">Shopping Cart</h4>
            <p x-show="$store.cart.length" class="font-bold" x-text="`Items (${$store.cart.length})`"></p>
        </header>

        <hr class="border-b border-neutral-700 my-3">

        <div>
            <div x-show="$store.cart.length === 0" class="tracking-wider text-center text-sm py-12 text-gray-500 dark:text-neutral-400">
                <x-lucide-shopping-bag class="size-12 text-neutral-600 mx-auto mb-3"/>
                <h3 class="font-light">Your cart is empty!</h3>
                <x-button href="{{ route('store') }}" variant="link" class="text-sm py-0">Browse our products for awesome deals</x-button>
            </div>

            <div class="space-y-8">
                <template class="bg-red-500" x-for="item in $store.cart.items" :key="item.id">
                    <div class="grid grid-cols-12 justify-between gap-4 bg-neutral-800 rounded">
                        <div class="col-span-6">
                            <img class="w-full h-full rounded object-cover" :src="item.image" :alt="item.name"  alt="" src=""/>
                        </div>
                        <div class="col-span-6 flex flex-col items-start space-y-4">
                            <div>
                                <h4 class="text-lg py-2" x-text="item.name"></h4>
                                <p class="text-gray-500 dark:text-neutral-400 font-bold" x-text="$store.helpers.formatMoney(item.price)"></p>
                            </div>

                            <div class="inline-flex items-center justify-between gap-1">
                                <button class="p-1" @click="$store.cart.updateQuantity(item.id, -1)">
                                    <x-lucide-minus-circle class="size-6"/>
                                </button>
                                <span class="block rounded-lg px-2" x-text="item?.quantity"></span>
                                <button class="p-1" @click="$store.cart.updateQuantity(item.id, 1)">
                                    <x-lucide-plus-circle class="size-6"/>
                                </button>
                            </div>

                            <div class="flex justify-between items-center w-full">
                                <p x-text="$store.helpers.formatMoney(item.price * item.quantity)"></p>
                                <x-button @click="$store.cart.removeFromCart(item.id)" size="sm" variant="link" color="danger" class="px-0">
                                    <x-lucide-trash-2 class="size-4" />
                                </x-button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>


    <section class="lg:col-span-4 bg-neutral-200 dark:bg-neutral-800 p-4 rounded flex flex-col min-h-[350px]">
        <header class="py-1 flex items-center justify-between">
            <h4>Order Summary</h4>
            <x-button size="sm" color="danger" variant="link" @click="$store.cart.clearCart()">
                <x-lucide-trash-2 class="size-4"/>
                Clear All
            </x-button>
        </header>

        <hr class="dark:border-neutral-600 my-2">

        <div class="flex-1 flex flex-col">
            <div class="flex justify-between items-center">
                <p class="font-bold">Items</p>
                <p class="font-bold" x-text="$store.helpers.formatMoney($store.cart.subtotal)"></p>
            </div>

            <ul class="mt-6 space-y-2">
                <li class="flex justify-between items-center">
                    <span class="text-sm">Shipping</span>
                    <span class="text-sm" x-text="$store.helpers.formatMoney(0)"></span>
                </li>
            </ul>

            <ul class="mt-auto mb-3">
                <li class="flex justify-between items-center">
                    <span class="font-bold">Total</span>
                    <span class="font-bold" x-text="$store.helpers.formatMoney($store.cart.total)"></span>
                </li>
            </ul>

            <div>
                <x-button class="w-full justify-center" @click="$store.cart.checkout('{{ route('checkout') }}')" x-bind:disabled="$store.cart.processing">
                    <span class="flex justify-between w-full gap-2" x-show="!$store.cart.processing">
                        <span class="first-letter:capitalize">
                            <span class="hidden lg:inline-block">Proceed to</span>
                            checkout
                        </span>
                        <x-lucide-arrow-right class="size-4"/>
                    </span>
                    <span class="flex justify-between w-full gap-2" x-show="$store.cart.processing">
                        Processing
                        <x-lucide-loader class="size-4 animate-spin"/>
                    </span>
                </x-button>
                <x-button :href="route('store')" variant="outline" class="w-full justify-center mt-2">Continue shopping</x-button>
            </div>
        </div>
    </section>
</div>
</x-app-layout>
