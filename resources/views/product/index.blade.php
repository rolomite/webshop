<x-adminlayout>
    <x-slot:header class="flex justify-between items-center">
        <h1 class="dark:text-white text-lg font-bold">Products</h1>
        <x-button href="{{ route('admin.products.create') }}" size="sm" variant="solid" color="primary">
            <div><x-lucide-plus-circle class="size-4"/></div>
            <div>New Product</div>
        </x-button>
    </x-slot:header>
    <div class="my-10 space-y-10">
        <x-table>
            <x-slot:title>Products</x-slot:title>
            <x-slot:description>List of all products in store</x-slot:description>
            <x-table.header>
                <x-table.heading>Image</x-table.heading>
                <x-table.heading>Name</x-table.heading>
                <x-table.heading>Price</x-table.heading>
                <x-table.heading>Published</x-table.heading>
                <x-table.heading>Actions</x-table.heading>
            </x-table.header>
            <x-table.body>
                @forelse($products as $product)
                   <x-table.row>
                       <x-table.cell>
                           <img class="w-8 h-8 aspect-square object-cover rounded-lg" src="{{ asset($product->featured_image) }}" alt="{{ $product->title }}">
                       </x-table.cell>
                       <x-table.cell>{{ $product->name }}</x-table.cell>
                       <x-table.cell>{{ \Illuminate\Support\Number::currency($product->price, 'NGN') }}</x-table.cell>
                       <x-table.cell>{{ $product->published() ? 'Yes' : 'No' }}</x-table.cell>
                       <x-table.cell>
                           <div class="flex gap-2 items-center">
                               <x-button variant="ghost" href="{{ route('admin.products.edit', $product) }}" title="Edit" tooltip>
                                   <x-lucide-edit class="size-4" />
                               </x-button>
                               <x-button variant="ghost" color="danger" title="Delete" form="product-delete-form-{{$product->id}}" tooltip>
                                   <x-lucide-trash class="size-4 text-inherit" />
                               </x-button>
                               <form action="{{ route('admin.products.destroy', $product) }}" method="post" id="product-delete-form-{{$product->id}}" onsubmit="return confirm('You are about to delete **{{ $product->name }}**, are you sure of this action ?')">
                                   @csrf
                                   @method('DELETE')
                               </form>
                           </div>
                       </x-table.cell>
                   </x-table.row>
                @empty
                    <x-table.cell colspan="5">
                        <div class="text-center text-neutral-500 flex flex-col justify-between items-center gap-1">
                            <x-lucide-archive class="size-12 stroke-1 text-neutral-500"/>
                            <span>No product available in your store</span>
                            <x-button variant="link" :href="route('admin.products.create')">Add a product</x-button>
                        </div>
                    </x-table.cell>
                @endforelse
            </x-table.body>
        </x-table>
    </div>
</x-adminlayout>
