<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <!-- Menampilkan Data Kost -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Tersedia Kos</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($kosKami as $kost)
                        <a href="">
                            <div class="h-full hover:bg-orange-200 p-2 rounded-lg transition-all duration-300 border border-orange-200">
                                <img src="{{ asset('storage/'.$kost->image) }}" alt="{{ $kost->nama }}" class="h-32 w-full rounded-lg object-cover">
                                <div class="py-2">
                                    <h1 class="text-sm font-semibold text-gray-800">{{ $kost->nama }}</h1>
                                    <p class="text-sm text-gray-600">{{ $kost->address->formatted_address }}</p>
                                    <span class="text-sm text-orange-600">Rp. {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                                    <span class="block text-sm text-gray-600">Kamar Tersedia: {{ $kost->kamar_tersedia }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>