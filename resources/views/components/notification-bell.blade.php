@props(['notifications'])

<div class="inline-block relative"
     x-data="{
        open: false,
        showDetail: false,
        selectedNotification: null,

        markAsRead(notificationId) {
            fetch('/notifications/mark-as-read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({ notification_id: notificationId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        },

        markAllAsRead() {
            fetch('/notifications/mark-all-as-read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        },

        clearReadNotifications() {
            fetch('/notifications/clear-read', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }
     }">
    <button @click="open = !open" class="relative p-2 text-gray-700 hover:text-gray-900 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        @if($notifications->where('is_read', false)->count() > 0)
            <span class="inline-flex absolute top-0 right-0 justify-center items-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">
                {{ $notifications->where('is_read', false)->count() }}
            </span>
        @endif
    </button>

    <!-- Dropdown menu -->
    <div x-show="open"
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="overflow-hidden absolute right-0 z-50 mt-2 w-96 bg-white rounded-md shadow-lg origin-top-right">
        <div class="flex flex-col max-h-[80vh]">
            <div class="px-4 py-2 font-semibold text-gray-700 bg-gray-50 border-b">
                <div class="flex justify-between items-center">
                    <span>Pengingat Jatuh Tempo</span>
                    <div class="flex gap-2">
                        @if($notifications->where('is_read', false)->count() > 0)
                            <button @click="markAllAsRead()"
                                    class="px-2 py-1 text-xs font-medium text-orange-600 bg-orange-100 rounded hover:bg-orange-200 transition-colors">
                                Tandai Semua Dibaca
                            </button>
                        @endif
                        @if($notifications->where('is_read', true)->count() > 0)
                            <button @click="clearReadNotifications()"
                                    class="px-2 py-1 text-xs font-medium text-red-600 bg-red-100 rounded hover:bg-red-200 transition-colors">
                                Bersihkan
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="overflow-y-auto max-h-[calc(80vh-40px)] scrollbar-thin scrollbar-thumb-orange-500 scrollbar-track-gray-100">
                @if($notifications->count() > 0)
                    @foreach($notifications->sortByDesc('created_at') as $notification)
                        <div @click="selectedNotification = {{ json_encode($notification) }}; showDetail = true; @if(!$notification->is_read) markAsRead({{ $notification->id }}); @endif"
                             class="px-4 py-3 border-b hover:bg-gray-100 cursor-pointer {{ $notification->is_read ? 'bg-white' : 'bg-gray-100' }}">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-0.5">
                                    <svg class="w-5 h-5 {{ $notification->is_read ? 'text-gray-400' : 'text-orange-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1 ml-3 w-0">
                                    <p class="text-sm font-medium {{ $notification->is_read ? 'text-gray-600' : 'text-gray-900' }}">
                                        {{ $notification->type === 'admin_reminder' ? 'Pengingat dari Admin' : 'Pengingat Otomatis' }}
                                    </p>
                                    <p class="mt-1 text-sm {{ $notification->is_read ? 'text-gray-400' : 'text-gray-500' }}">
                                        {{ $notification->message }}
                                    </p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="px-4 py-3 text-sm text-gray-500">
                        Tidak ada pengingat jatuh tempo
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div x-show="showDetail"
         class="overflow-y-auto fixed inset-0 z-50"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">
        <div class="flex justify-center items-end px-4 pt-4 pb-20 min-h-screen text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showDetail"
                 @click.away="showDetail = false"
                 class="inline-block overflow-hidden px-4 pt-5 pb-4 text-left align-bottom bg-white rounded-lg shadow-xl transition-all transform sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                            Detail Pengingat
                        </h3>
                        <div class="mt-4 text-left">
                            <template x-if="selectedNotification">
                                <div>
                                    <p class="mb-2">
                                        <span class="font-semibold">Tipe:</span>
                                        <span x-text="selectedNotification.type === 'admin_reminder' ? 'Pengingat dari Admin' : 'Pengingat Otomatis'"></span>
                                    </p>
                                    <p class="mb-2">
                                        <span class="font-semibold">Pesan:</span>
                                        <span x-text="selectedNotification.message"></span>
                                    </p>
                                    <p class="mb-2">
                                        <span class="font-semibold">Status:</span>
                                        <span x-text="selectedNotification.is_read ? 'Sudah dibaca' : 'Belum dibaca'"></span>
                                    </p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button"
                            @click="showDetail = false"
                            class="inline-flex justify-center px-4 py-2 w-full text-base font-medium text-white bg-orange-600 rounded-md border border-transparent shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom scrollbar styles */
.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #ed8936;
    border-radius: 3px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #dd6b20;
}
</style>
