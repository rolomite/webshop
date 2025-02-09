@props(['product' => null])

@php
$images = [];
foreach ($product->images ?? [] as $image){
    $images[] = asset($image);
}
@endphp


<div>
<form action="{{$product ? route('admin.products.update', $product) : route('admin.products.store')}}" method="POST" class="w-full max-w-2xl grid lg:grid-cols-2 gap-4" enctype="multipart/form-data">
    @csrf
    @if($product)
        @method('PUT')
    @endif
        <div class="col-span-full">
            <x-file-input name="images[]" :errors="$errors->first('images')" label="Upload Images" value="{{ $product?->featured_image ? asset($product->featured_image) : null }}" :files="$images" multiple=""/>
        </div>
        <div class="col-span-full">
            <x-text-input name="name" label="Product Name" value="{{ $product?->name }}" placeholder="White T-shirt"/>
        </div>

        <x-text-input name="price" label="Price" value="{{ $product?->price }}" placeholder="100000.00">
            <x-slot:prefix>
                <x-lucide-dollar-sign class="size-4" />
            </x-slot:prefix>
        </x-text-input>
        <x-select name="published_at" id="publish_now" label="Publish Now" :options="['Publish' => 'published', 'Draft' => 'draft']"  value="{{ $product?->published() ? 'published' : 'draft' }}">
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
        </x-select>
       <div class="col-span-full">
           <x-textarea name="description" label="Description" value="{{ $product?->description }}" placeholder="Provide detailed information about this project"/>
       </div>


        <x-primary-button class="col-span-full">
            Save Product
            <x-lucide-save class="size-4"/>
        </x-primary-button>
</form>
</div>
