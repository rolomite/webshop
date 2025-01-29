@props(['product'])

<div class="relative flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
    <img class="w-full h-[180px] object-cover rounded-t-xl" src="{{asset($product->image)}}" alt="{{$product->title}}">
    <div class="p-2">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
            {{ $product->project_name }}
        </h3>
{{--        <p class="mt-1 text-gray-500 dark:text-neutral-400">--}}
{{--            {{ $product->description }}--}}
{{--        </p>--}}
        <div class="mt-4 flex flex-col gap-4">
            <span x-currency:NGN="{{$product->price}}" class="flex-1 font-bold"></span>
            @isset($actions)
                {{$actions}}
            @endisset
        </div>
    </div>
    <a href="{{route('store.product', $product->id)}}" class="absolute inset-0 z-10"></a>
</div>
