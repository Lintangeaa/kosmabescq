<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between items-center px-4 sm:px-8">
            <div class="mt-2 mb-2">
                <a href="{{ route('customer.kost.index') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Kembali</a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Kost') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:p-8 md:p-12">
        <div class="bg-white shadow-lg rounded-lg p-4 sm:p-6 lg:p-8">
            <div class="flex justify-center mb-8">
                <!-- Gambar utama kost -->
                @if($kost->image)
                    <img src="{{ asset('storage/'.$kost->image) }}" alt="{{ $kost->nama }}" class="rounded-lg shadow-lg max-w-full h-auto">
                @else
                    <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="No Image" class="rounded-lg shadow-lg max-w-full h-auto">
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nama Kost -->
                <div>
                    <h3 class="text-3xl font-semibold text-gray-800">{{ $kost->nama }}</h3>
                </div>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Alamat</h4>
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-x-0 sm:space-x-4 mt-2">
                    <p class="text-gray-600">{{ $kost->alamat_lengkap }}</p>
                    <a href="{{ $kost->gmap }}" target="_blank" class="text-blue-600 hover:underline mt-2 sm:mt-0 flex items-center">
                        <i class="fa fa-map-marker-alt text-red-500 mr-2"></i> Lihat di Google Maps
                    </a>
                </div>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Fasilitas</h4>
                <p class="text-gray-600 mt-2">{!! $kost->fasilitas !!}</p>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Informasi Tambahan</h4>
                <p class="text-gray-600 mt-2">{!! $kost->informasi !!}</p>
                <p class="text-xl text-gray-600 mt-2">Rp. <span class="text-orange-600 font-semibold">{{ number_format($kost->harga, 0, ',', '.') }}</span> / bulan</p>
            </div>

            <!-- Button untuk memesan atau kontak -->
            <div class="flex justify-center mt-8">
                <x-redirect-button href="{{ route('customer.reservations.create', ['kost_id' => $kost->id]) }}">
                    Reservasi
                </x-redirect-button>
            </div>
        </div>
    </div>
</x-app-layout>
