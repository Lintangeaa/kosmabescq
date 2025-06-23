<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Kos -->
                <div class="p-6 bg-white rounded-lg border border-orange-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-full">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Total Kos</h3>
                            <p class="text-2xl font-bold text-orange-600">{{ $totalKos }}</p>
                        </div>
                    </div>
                </div>

                <!-- Kamar Tersedia -->
                <div class="p-6 bg-white rounded-lg border border-green-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Kamar Tersedia</h3>
                            <p class="text-2xl font-bold text-green-600">{{ $totalKamarTersedia }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Reservasi -->
                <div class="p-6 bg-white rounded-lg border border-blue-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Total Reservasi</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $totalReservasi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Pendapatan -->
                <div class="p-6 bg-white rounded-lg border border-purple-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Pendapatan</h3>
                            <p class="text-2xl font-bold text-purple-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Kos -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Daftar Kos</h2>
                    <a href="{{ route('admin.kost.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        Tambah Kos
                    </a>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @forelse ($kosKami as $kost)
                            <div class="relative bg-white rounded-lg border border-gray-200 shadow-sm transition-all duration-300 group hover:shadow-lg hover:border-orange-300">
                                <div class="overflow-hidden rounded-t-lg aspect-w-16 aspect-h-9">
                                    <img src="{{ asset('storage/' . $kost->image) }}" alt="{{ $kost->nama }}"
                                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $kost->nama }}</h3>
                                    <p class="mb-2 text-sm text-gray-600">{{ $kost->address->formatted_address }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-orange-600">
                                            Rp {{ number_format($kost->harga, 0, ',', '.') }}
                                        </span>
                                        <span class="px-3 py-1 text-sm {{ $kost->kamar_tersedia > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full">
                                            {{ $kost->kamar_tersedia }} Kamar
                                        </span>
                                    </div>
                                    <div class="flex mt-4 space-x-2">
                                        <a href="{{ route('admin.kost.edit', $kost->id) }}"
                                           class="flex-1 px-4 py-2 text-sm text-center text-orange-600 bg-orange-100 rounded-md transition-colors hover:bg-orange-200">
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.kost.show', $kost->id) }}"
                                           class="flex-1 px-4 py-2 text-sm text-center text-white bg-orange-500 rounded-md transition-colors hover:bg-orange-600">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-12 text-center">
                                <div class="inline-flex justify-center items-center mb-4 w-16 h-16 bg-orange-100 rounded-full">
                                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <h3 class="mb-2 text-lg font-medium text-gray-900">Belum ada kos tersedia</h3>
                                <p class="mb-6 text-gray-500">Mulai tambahkan kos pertama Anda untuk ditampilkan di sini.</p>
                                <a href="{{ route('admin.kost.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                    <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Tambah Kos Baru
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
