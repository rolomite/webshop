<x-app-layout>
    <div class="w-full p-5 flex flex-col bg-white border shadow-sm rounded-md dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <p class="mt-1 pb-5 border-b text-lg text-gray-500 dark:text-white">
            Cart (
            <span x-text="cart.length"></span>
            )
        </p>
        <div>
            <div x-show="cart.length === 0" class="tracking-wider text-center text-sm  space-y-4 my-5 text-gray-500 dark:text-neutral-400">
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
                        <p>NGN <span x-text="item.price"></span></p>
                    </div>
                    <div class="flex items-center justify-between"> <button @click="removeFromCart(item.id)" class="text-teal-400 flex items-center gap-x-2 text-sm"> Remove</button>
                    </div>
                </div>
            </template>
        </div>
        <div x-show="cart.length > 0">
            <div class="flex items-center justify-between border-t pt-5 mb-5">
                Total: <p >NGN<span class="ml-2" x-text="totalPrice"></span></p>
            </div>
            <a href="#" class="w-full p-4 rounded-md bg-blue-500 inline-block text-center">checkout</a>
        </div>
    </div>
</x-app-layout>