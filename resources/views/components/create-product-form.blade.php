<form action="{{route('products.store')}}" method="POST" class="w-full" enctype="multipart/form-data">
    @csrf
    <div class="w-full space-y-5">

        @if (session('success'))
        <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
            <div class="flex">
                <div class="shrink-0">
                    <!-- Icon -->
                    <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </span>
                    <!-- End Icon -->
                </div>
                <div class="ms-3">
                    <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
                        Successfully created.
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-white">
                        {{session('success')}}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Floating Input -->
        <div class="">
            @error('project_name')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <div class="relative w-full">
                <input type="text" name="project_name" id="project_name" value="{{old('project_name')}}" class="peer py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-neutral-700 dark:text-white dark:focus:ring-neutral-600 focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2" placeholder="you@email.com">
                <label for="project_name" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:scale-90 peer-focus:translate-x-0.5
peer-focus:-translate-y-1.5
peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
peer-[:not(:placeholder-shown)]:scale-90
peer-[:not(:placeholder-shown)]:translate-x-0.5
peer-[:not(:placeholder-shown)]:-translate-y-1.5
peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 .">Product Name</label>
            </div>
        </div>
        <!-- End Floating Input -->

        <!-- Floating Input -->
        <div>
            @error('preview_link')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <div class="relative w-full">
                <input type="text" name="preview_link" id="preview_link" class="peer py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-neutral-700 dark:text-white dark:focus:ring-neutral-600
focus:pt-6
focus:pb-2
[&:not(:placeholder-shown)]:pt-6
[&:not(:placeholder-shown)]:pb-2
autofill:pt-6
autofill:pb-2" placeholder="********">
                <label for="preview_link" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
peer-focus:scale-90
peer-focus:translate-x-0.5
peer-focus:-translate-y-1.5
peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
peer-[:not(:placeholder-shown)]:scale-90
peer-[:not(:placeholder-shown)]:translate-x-0.5
peer-[:not(:placeholder-shown)]:-translate-y-1.5
peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 .">Preview link</label>
            </div>
        </div>
        <!-- End Floating Input -->

        <!-- Floating Input -->
        <div>
            @error('price')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <div class="relative w-full">
                <input type="text" name="price" id="price" class="peer py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-neutral-700 dark:text-white dark:focus:ring-neutral-600
focus:pt-6
focus:pb-2
[&:not(:placeholder-shown)]:pt-6
[&:not(:placeholder-shown)]:pb-2
autofill:pt-6
autofill:pb-2" placeholder="********">
                <label for="price" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
peer-focus:scale-90
peer-focus:translate-x-0.5
peer-focus:-translate-y-1.5
peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
peer-[:not(:placeholder-shown)]:scale-90
peer-[:not(:placeholder-shown)]:translate-x-0.5
peer-[:not(:placeholder-shown)]:-translate-y-1.5
peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 .">Price</label>
            </div>
        </div>
        <!-- End Floating Input -->


        <!-- Floating Input -->
        <div>
            @error('repo_link')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <div class="relative w-full">
                <input type="text" name="repo_link" id="repo-link" class="peer py-3 px-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-neutral-700 dark:text-white dark:focus:ring-neutral-600
focus:pt-6
focus:pb-2
[&:not(:placeholder-shown)]:pt-6
[&:not(:placeholder-shown)]:pb-2
autofill:pt-6
autofill:pb-2" placeholder="********">
                <label for="repo_link" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
peer-focus:scale-90
peer-focus:translate-x-0.5
peer-focus:-translate-y-1.5
peer-focus:text-gray-500 dark:peer-focus:text-neutral-500
peer-[:not(:placeholder-shown)]:scale-90
peer-[:not(:placeholder-shown)]:translate-x-0.5
peer-[:not(:placeholder-shown)]:-translate-y-1.5
peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500 .">Repo link</label>
            </div>
        </div>
        <!-- End Floating Input -->

        <!-- Floating Input -->
        <div>
            @error('image')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <div class="w-full">
                <form>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input name="image" type="file" class="block rounded-lg outline-none w-full text-sm dark:text-white
                        dark:bg-gray-700 dark:border-neutral-700 dark:focus:ring-neutral-600
        file:me-4 file:py-3 file:px-4 file:border-0
        file:text-sm file:font-semibold
        file:bg-blue-600 file:text-white
        hover:file:bg-blue-700
        file:disabled:opacity-50 file:disabled:pointer-events-none
        dark:file:bg-blue-500
        dark:hover:file:bg-blue-400
      ">
                    </label>
                </form>
            </div>
        </div>
        <!-- End Floating Input -->

        <!-- Floating Select -->
        <div>
            @error('publish_now')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <select name="publish_now" id="publish_now" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-neutral-700 dark:text-white dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option value="publish">Publish</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <!-- End Floating Select -->

        <!-- Floating Input -->
        <div>
            @error('description')
            <p class="mb-1 text-red-500">{{$message}}</p>
            @endError
            <textarea name="description" class="dark:bg-gray-700 py-3 px-4 block w-full dark:text-white rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="Give a desccription..."></textarea>
        </div>
        <!-- End Floating Input -->


        <button class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Save Product
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
        </button>
</form>