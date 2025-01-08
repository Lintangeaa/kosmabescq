<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Reservasi') }}
        </h2>
    </x-slot>
  
    <div class="p-12">
        @if($reservations->isEmpty())
            <div class="text-center">
                <p class="text-gray-600">Tidak ada reservasi yang ditemukan.</p>
                <a href="{{ route('customer.kost.index') }}" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Cari Kos</a>
            </div>
        @else
            <div class="overflow-x-auto sm:grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($reservations as $reservation)
                <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $reservation->kost->nama }}</h3>
                    <p class="text-gray-600 mt-2">ID Reservasi: <span class="font-medium text-gray-800">{{ $reservation->id }}</span></p>
                    <p class="text-gray-600 mt-1">Tanggal Mulai: <span class="font-medium text-gray-800">{{ $reservation->tanggal_reservasi }}</span></p>
                    <p class="text-gray-600 mt-1">Total Bulan: <span class="font-medium text-gray-800">{{ floor($reservation->total) }} Bulan</span></p>
                    <p class="text-gray-600 mt-1">Status: <span class="font-medium text-gray-800">{{ $reservation->status }}</span></p>
                
                    @if($reservation->status == 'Menunggu Pembayaran')
                        <div class="mt-4 text-center">
                            <a href="{{ route('customer.reservations.payment', $reservation->reservation_id) }}" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Bayar Sekarang
                            </a>
                        </div>
                    @elseif($reservation->status == 'Dibayar')
                        <div class="mt-4 text-center">
                            <a href="{{ route('customer.reservations.invoice', $reservation->reservation_id) }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Lihat Invoice
                            </a>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
