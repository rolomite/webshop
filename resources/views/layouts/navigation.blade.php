@php
$navigations = [
[
'title' => 'Store',
'href' => route('store'),
'active' => request()->routeIs('store')
],
];
@endphp
<nav class="bg-neutral-800" x-data="{isOpen: false}">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <x-application-logo />
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @foreach($navigations as $navItem)
                        <a href="{{ $navItem['href'] }}" @if($navItem['active']) aria-current="page" @endif @class([ "rounded-md px-3 py-2 text-sm font-medium" , "bg-neutral-900 text-white"=> $navItem['active'],
                            "text-neutral-300 hover:bg-neutral-700 hover:text-white" => !$navItem['active'],
                            ])>{{ $navItem['title'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <a href="{{route('cart.index')}}" class="relative rounded-full bg-neutral-800 p-1 text-neutral-400 hover:text-white focus:outline-none focus:ring-white">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View cart</span>
                        <x-lucide-shopping-cart class="size-6" />
                        <span x-show="cart.count > 0" class="absolute -top-1 -right-2 text-xs font-bold text-center w-5 h-5 flex items-center justify-center text-white bg-teal-800/90 rounded-full" x-text="cart.length"></span>
                    </a>


                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button @click="isOpen = !isOpen" x-cloak type="button" class="relative flex max-w-xs items-center rounded-full bg-neutral-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-neutral-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>
                        <div
                            x-show="isOpen"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            @click.outside="isOpen = false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{route('admin.profile.edit')}}" role="menuitem" tabindex="-1" id="user-menu-item-0" @class([ "block px-4 py-2 text-sm text-neutral-700" , "bg-neutral-100 outline-none"=> request()->routeIs('admin.profile.edit')
                                ])>Your Profile</a>
                            <button form="logout-form" class="block px-4 py-2 text-sm text-neutral-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button @click="isOpen = !isOpen" x-transition type="button" class="relative inline-flex items-center justify-center rounded-md bg-neutral-800 p-2 text-neutral-400 hover:bg-neutral-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-neutral-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="isOpen" @click.outside="isOpen = false">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            @foreach($navigations as $navItem)
            <a href="{{ $navItem['href'] }}" @class([ "block rounded-md px-3 py-2 text-base font-medium text-neutral-300 hover:bg-neutral-700 hover:text-white" , "bg-neutral-900 text-white"=> $navItem['active']
                ]) @if($navItem['active']) aria-current="page" @endif>{{ $navItem['title'] }}</a>
            @endforeach
        </div>
        <div class="border-t border-neutral-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">Tom Cook</div>
                    <div class="text-sm font-medium text-neutral-400">tom@example.com</div>
                </div>

                <a href="{{route('cart.index')}}" class="relative ml-auto shrink-0 rounded-full bg-neutral-800 p-1 text-neutral-400 hover:text-white focus:outline-none focus:ring-white">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View cart</span>
                        <x-lucide-shopping-cart class="size-6" />
                        <span x-show="cart.length > 0" class="absolute -top-1 -right-2 text-xs font-bold text-center w-5 h-5 flex items-center justify-center text-white bg-teal-800/90 rounded-full" x-text="cart.length"></span>
                    </a>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="{{route('admin.profile.edit')}}" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-neutral-700 hover:text-white">Your Profile</a>
                <button form="logout-form" class="block rounded-md px-3 py-2 text-base font-medium text-neutral-400 hover:bg-neutral-700 hover:text-white">Sign out</button>
            </div>
        </div>
    </div>
</nav>