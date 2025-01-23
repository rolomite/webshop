@props(['product'])

<div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
    <img class="w-full h-[180px] object-cover rounded-t-xl" src="{{asset($product->image)}}" alt="{{$product->title}}">
    <div class="p-2">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
            {{ $product->project_name }}
        </h3>
{{--        <p class="mt-1 text-gray-500 dark:text-neutral-400">--}}
{{--            {{ $product->description }}--}}
{{--        </p>--}}
        <div class="mt-4 flex flex-col gap-4">
            <span class="flex-1 font-bold">NGN{{$product->price}}</span>
            @isset($actions)
                {{$actions}}
            @endisset
        </div>
    </div>
</div>
