<x-admin-layout>
    <div class="flex flex-col">
        <h4 class="dark:text-neutral-200 font-medium text-lg mb-2">Admin Settings</h4>

        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 w-1/3 inline-block align-middle">
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Key</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach (config('settings') as $key => $value)
                            <tr>
                                <td class="py-2 px-6 text-xs">{{$key}}</td>
                                <td class="py-2 px-6 text-xs">
                                    @error($key)
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                    <form action="{{route('admin.settings.store')}}" method="post">
                                        @csrf
                                        <label for="{{$key}}" class="sr-only">{{$key}}</label>
                                        <input onblur="this.closest('form').submit()" type="{{$value['type']}}" name="{{$key}}" value="{{ old($key, isset($settings[$key]['value']) ? $settings[$key]['value'] : '') }}" id="{{$key}}" class="text-sm bg-transparent outline-none focus:ring-0  w-full border rounded-sm p-2" />
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>