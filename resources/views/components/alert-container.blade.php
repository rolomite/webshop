@php
    $alertTypes = ['success', 'error', 'info', 'warning']
@endphp

<div x-data="">
    @foreach($alertTypes as $type)
        @if($message = session($type))
            <div x-init="$store.alert.{{$type}}('{{ $message }}')"></div>
        @endif
    @endforeach

    <div class="fixed top-5 z-20 inset-x-5 space-y-4">
        <template x-for="notification in $store.alert.notifications" :key="notification.id">
            <div x-show="notification.visible" x-transition
                 class="p-3 rounded-lg shadow-lg text-white w-full max-w-xs flex items-center mx-auto"
                 :class="{
                    success: 'bg-green-500 text-green-200',
                    error: 'bg-red-500 text-red-200',
                    warning: 'bg-yellow-500 text-yellow-200',
                    info: 'bg-blue-500 text-blue-200',
                }[notification.type] || 'bg-red-500'"
                 x-init="$store.alert.autoDismiss(notification.id)">
                <span class="flex-1" x-text="notification.message"></span>
                <button @click="$store.alert.closeAlert(notification.id)" class="ml-4 text-white font-bold">×</button>
            </div>
        </template>
    </div>
</div>
