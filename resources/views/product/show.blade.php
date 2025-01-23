<x-admin-layout>
    <x-slot:header class="flex justify-between items-center">
        <h1 class="dark:text-white text-lg font-bold">{{$product->project_name}}</h1>
        <a href="{{ route('admin.products.edit', $product) }}"
           class="cursor-pointer py-3 px-4 inline-flex items-center gap-x-1 font-medium rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
            Edit
            <x-lucide-edit class="4" />
        </a>
    </x-slot:header>

    <section class="flex flex-col lg:flex-row items-start gap-4">
        <div class="max-w-2xl w-full">
            <img src="{{asset($product->image)}}" alt="{{ $product->product_name }}" class="w-full max-w-lg">
            <h4 class="text-lg font-medium mt-4 mb-1 dark:text-neutral-100">Product Description</h4>
            <p class="text-sm">{{$product->description}}</p>
        </div>
        <ul class="flex flex-col w-full">
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                <div class="flex items-center justify-between w-full">
                    <span>Published <br> <span class="text-red-500 text-xs">{{ $errors->first('published_at') }}</span></span>
                    <form action="{{route('admin.products.update', $product)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <x-switch onchange="this.closest('form').submit()" :checked="$product->published()"/>
                        <input type="hidden" name="published_at" value="{{$product->published() ? 'draft' : 'published'}}">
                    </form>
                </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                <div class="flex items-center justify-between w-full">
                    <span>Name</span>
                    <span>{{ $product->project_name }}</span>
                </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                <div class="flex items-center justify-between w-full">
                    <span>Price</span>
                    <span>{{ \Illuminate\Support\Number::currency($product->price, 'NGN') }}</span>
                </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                <div class="flex items-center justify-between w-full">
                    <span>URL</span>
                    <span>
                        <a href="{{ $product->preview_link }}">{{ $product->preview_link }} <x-lucide-external-link class="size-3 ml-1 inline-block"/></a>
                    </span>
                </div>
            </li>
            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-neutral-700 dark:text-neutral-200">
                <div class="flex items-center justify-between w-full">
                    <span>Project Repo</span>
                    <span>
                        <a href="{{ $product->repo_link }}">{{ $product->repo_link }} <x-lucide-external-link class="size-3 ml-1 inline-block"/></a>
                    </span>
                </div>
            </li>
        </ul>
    </section>
</x-admin-layout>
