<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Reservasi') }}
        </h2>
    </x-slot>

    <div class="p-12">
        @if ($reservations->isEmpty())
            <div class="text-center">
                <p class="mb-6 text-gray-600">Tidak ada reservasi yang ditemukan.</p>
                <a href="{{ route('customer.kost.index') }}"
                    class="px-4 py-2 mt-4 text-white bg-orange-500 rounded hover:bg-orange-600">Cari Kos</a>
            </div>
        @else
            <div class="overflow-x-auto gap-6 sm:grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($reservations as $reservation)
                    @php
                        $statusColor = match($reservation->status) {
                            'Dibatalkan' => 'red',
                            'Selesai' => 'green',
                            'Dibayar' => 'blue',
                            'Menunggu Pembayaran' => 'yellow',
                            default => 'gray'
                        };
                    @endphp
                    <div class="p-6 rounded-lg shadow-sm mb-6 border hover:shadow-lg transition-shadow duration-300
                        bg-{{ $statusColor }}-100 border-{{ $statusColor }}-300">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $reservation->kost->nama }}</h3>
                        <p class="mt-2 text-gray-600">ID Reservasi: <span
                                class="font-medium text-gray-800">{{ $reservation->reservation_id }}</span></p>
                        <p class="mt-1 text-gray-600">Tanggal Mulai: <span
                                class="font-medium text-gray-800">{{ $reservation->tanggal_reservasi }}</span></p>
                        <p class="mt-1 text-gray-600">Total Bulan: <span
                                class="font-medium text-gray-800">{{ floor($reservation->total) }} Bulan</span></p>

                        <!-- Status Section -->
                        <p class="mt-1 text-gray-600">
                            Status:
                            <span class="font-medium text-{{ $statusColor }}-600">
                                {{ $reservation->status }}
                            </span>
                        </p>

                        <div class="mt-4 text-center">
                            @switch($reservation->status)
                                @case('Menunggu Pembayaran')
                                    <a href="{{ route('customer.reservations.payment', $reservation->reservation_id) }}"
                                        class="inline-block px-5 py-2 text-white bg-{{ $statusColor }}-600 rounded-lg hover:bg-{{ $statusColor }}-700 focus:outline-none focus:ring-2 focus:ring-{{ $statusColor }}-500">
                                        Bayar Sekarang
                                    </a>
                                    @break
                                @case('Dibayar')
                                @case('Selesai')
                                    <a href="{{ route('customer.reservations.invoice', $reservation->reservation_id) }}"
                                        class="inline-block px-5 py-2 text-white bg-{{ $statusColor }}-600 rounded-lg hover:bg-{{ $statusColor }}-700 focus:outline-none focus:ring-2 focus:ring-{{ $statusColor }}-500">
                                        Lihat Invoice
                                    </a>
                                    @break
                                @case('Dibatalkan')
                                    <span class="font-semibold text-{{ $statusColor }}-600">Reservasi Dibatalkan</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
