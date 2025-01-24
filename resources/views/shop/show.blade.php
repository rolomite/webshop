<x-app-layout>
    <div class="max-w-6xl mx-auto px-5 text-sm pt-10 dark:text-white">
        <div class="lg:flex justify-between max-md:space-y-5">
            <div class="w-full lg:size-[600px] max-h-max">
                <img src="{{asset($product->image)}}" alt="site screenshot">
            </div>

            <aside class="w-full lg:w-[40%] space-y-4">
                <div class="flex items-center justify-between font-bold text-lg">
                    <h2 class="capitalize">{{$product->project_name}}</h2>
                    <p>${{$product->price}}</p>
                </div>

                <p class="font-light">Repo Link: {{$product->repo_link}}</p>

                <div>
                    <div class="flex items-center justify-between">
                        <p class="font-light">Published: {{$product->published_at}}</p>
                    </div>
                </div>
                @error('id')
                <p>{{$message}}</p>
                @endError
                <div class="flex items-center gap-2">
                    <a href="{{$product->preview_link}}" class="flex-1 py-3 px-4 inline-flex items-center justify-between gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:text-teal-500 dark:bg-teal-800/30 dark:hover:bg-teal-800/20 dark:focus:bg-teal-800/20">
                        Preview <x-lucide-external-link class="size-4" />
                    </a>
                    <button x-on:click="addToCart({{$product}})" class="flex-1 flex justify-center items-center size-[46px] gap-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        <x-lucide-shopping-cart class="size-4" /> ADD TO CART
                    </button>
                    <a href="#" class="flex justify-center items-center size-[46px] text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        <x-lucide-message-circle class="size-4" />
                    </a>
                </div>
            </aside>
        </div>

        <!-- description section -->
        <div class="mt-5 lg:mt-10 divide-y space-y-3 lg:max-w-[56%]">
            <p class="text-lg lg:text-xl capitalize">{{$product->project_name}} - overview</p>
            <p class="pt-3">{{$product->description}}</p>
        </div>
    </div>
</x-app-layout>