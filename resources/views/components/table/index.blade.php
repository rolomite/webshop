@props(['title' => null, 'searchable' => false, 'description' => null])
<div class="container flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="inline-block min-w-full p-1.5 align-middle">
            <div class="divide-y divide-gray-200 rounded-lg border dark:divide-neutral-700 dark:border-neutral-700">
                <div class="flex flex-col px-4 py-3 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">{{ $title }}</h2>
                        <p class="text-sm font-medium text-gray-500 dark:text-neutral-500">{{ $description }}</p>
                    </div>
                    {{ $headerAction ?? null }}
                </div>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        @if ($header ?? false)
                            {{ $header }}
                        @endif
                        @if ($body ?? false)
                            {{ $body }}
                        @endif
                    </table>
                </div>
                @if ($footer ?? false)
                    <div class="px-4 py-1">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
