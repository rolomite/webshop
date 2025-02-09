@props(['product'])

<div class="flex flex-col bg-white border shadow-sm rounded dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
    <div class="relative h-44 overflow-hidden group rounded-t">
        <img class="w-full h-full object-cover scale-150 group-hover:scale-100 transition-transform duration-300" src="{{asset($product->featured_image)}}" alt="{{$product->name}}">
        <a href="{{route('store.product', $product)}}" class="absolute inset-0 z-10"></a>
    </div>
    <div class="p-2">
        <h3 class="text-sm  font-semibold dark:text-neutral-400 text-neutral-800">{{ $product->name }}</h3>
        <div class="flex justify-between items-center gap-4">
            <span class="flex-1 font-semibold text-sm dark:text-white">{{ \Illuminate\Support\Number::currency($product->price, 'NGN') }}</span>
            <x-button variant="ghost" size="sm" type="button" x-data="" @click="$store.cart.addToCart({{$product->toJson()}})" class="justify-between rounded-full">
                <x-lucide-shopping-bag class="size-4" />
            </x-button>
        </div>
    </div>
</div>
