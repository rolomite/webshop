<x-app-layout>
    <div class="max-w-4xl mx-auto px-5 text-sm pt-10 dark:text-white" x-data="">
        <section class="flex gap-4">
            <div class="w-full lg:size-[600px] max-h-max">
                <img x-ref="featuredImageElement" class="rounded-lg h-[300px] w-full object-center object-contain border dark:border-neutral-600 dark:bg-neutral-600" src="{{asset($product->featured_image)}}" alt="Product Feature Image">

                <div class="flex gap-2 items-center mt-4">
                    @foreach($product->images as $image)
                        <button @click="$refs.featuredImageElement.src = '{{asset($image)}}'">
                            <img class="rounded-lg size-16 object-cover" src="{{asset($image)}}" alt="product Image">
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-[40%]">
                <div class="space-y-2">
                    <h2 class="capitalize text-4xl font-bold">{{$product->name}}</h2>
                    <p class="text-lg font-bold mt-4">{{\Illuminate\Support\Number::currency($product->price, 'NGN')}}</p>
                </div>
                <div class="flex items-center gap-2 mt-12">
                    <x-button x-on:click="$store.cart.addToCart({{$product->toJson()}})" x-show="!$store.cart.getItem({{$product->id}})?.quantity">
                        <x-lucide-shopping-cart class="size-4" />
                        <span>{{ __('ADD TO CART') }}</span>
                    </x-button>

                    <div class="flex items-center gap-4" x-show="$store.cart.getItem({{$product->id}})?.quantity">
                        <x-button variant="outline" size="sm" @click="$store.cart.addToCart({{$product->toJson()}}, -1)">
                            <x-lucide-minus-circle class="size-4"/>
                        </x-button>
                        <span class="block w-full rounded-lg px-4 py-2" x-text="$store.cart.getItem({{$product->id}})?.quantity"></span>
                        <x-button variant="outline" size="sm" @click="$store.cart.addToCart({{$product->toJson()}}, 1)">
                            <x-lucide-plus-circle class="size-4"/>
                        </x-button>
                    </div>
                </div>
            </div>
        </section>

        <hr class="my-8 dark:border-neutral-600">

        <!-- description section -->
        <div class="lg:max-w-[56%]">
            <h4 class="text-lg lg:text-xl font-bold">Description</h4>
            <p class="mt-6">{{$product->description}}</p>
        </div>
    </div>
</x-app-layout>
