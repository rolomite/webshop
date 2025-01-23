@props(['product' => null])
<div>
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
<form action="{{$product ? route('admin.products.update', $product) : route('admin.products.store')}}" method="POST" class="w-full max-w-2xl grid lg:grid-cols-2 gap-4" enctype="multipart/form-data">
    @csrf
    @if($product)
        @method('PUT')
    @endif
        <div class="col-span-full">
            <x-file-input name="image" label="Preview Image" value="{{ $product?->image ? asset($product?->image) : null }}"/>
        </div>
        <div class="col-span-full">
            <x-text-input name="project_name" label="Project Name" value="{{ $product?->project_name }}" placeholder="Ecommerce v 0.0.1"/>
        </div>
        <x-text-input name="preview_link" label="Preview Link" value="{{ $product?->preview_link }}" placeholder="https://example.com">
            <x-slot:prefix>
                <x-lucide-image class="size-4" />
            </x-slot:prefix>
        </x-text-input>

        <x-text-input name="price" label="Price" value="{{ $product?->price }}" placeholder="100000.00">
            <x-slot:prefix>
                <x-lucide-dollar-sign class="size-4" />
            </x-slot:prefix>
        </x-text-input>
        <x-text-input name="repo_link" label="Repository URL" value="{{ $product?->repo_link }}" placeholder="https://github.com/username/repository">
            <x-slot:prefix>
                <x-lucide-github class="size-4" />
            </x-slot:prefix>
        </x-text-input>
        <x-select name="published_at" id="publish_now" label="Publish Now" :options="['Publish' => 'published', 'Draft' => 'draft']"  value="{{ $product?->published() ? 'published' : 'draft' }}">
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
        </x-select>
       <div class="col-span-full">
           <x-textarea name="description" label="Description" value="{{ $product?->repo_link }}" placeholder="Provide detailed information about this project"/>
       </div>


        <x-primary-button class="col-span-full">
            Save Product
            <x-lucide-save class="size-4"/>
        </x-primary-button>
</form>
</div>
