<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Detail Kos
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('admin.kost.edit', $kost->id) }}"
                   class="px-4 py-2 text-sm font-medium text-orange-600 bg-orange-100 rounded-lg hover:bg-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Edit Kos
                </a>
                <a href="{{ route('admin.kost.index') }}"
                   class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Image and Basic Info -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $kost->image) }}"
                                 alt="{{ $kost->nama }}"
                                 class="object-cover w-full h-[400px]">
                        </div>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $kost->nama }}</h3>
                                <p class="mt-2 text-gray-600">{{ $kost->address->formatted_address }}</p>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-orange-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600">Harga per Bulan</p>
                                    <p class="text-2xl font-bold text-orange-600">
                                        Rp {{ number_format($kost->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Status Kamar</p>
                                    <div class="flex flex-col items-end">
                                        <p class="mt-1 text-lg font-semibold {{ $kost->kamar_tersedia > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $kost->kamar_tersedia }} Tersedia
                                        </p>
                                        <p class="text-sm text-gray-500">dari {{ $kost->total_kamar }} Total Kamar</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-lg">
                                <h4 class="mb-2 text-lg font-semibold text-gray-900">Lokasi</h4>
                                <div class="space-y-2 text-gray-600">
                                    <p><span class="font-medium">Provinsi:</span> {{ $kost->address->provinsi }}</p>
                                    <p><span class="font-medium">Kota:</span> {{ $kost->address->kota }}</p>
                                    <p><span class="font-medium">Kecamatan:</span> {{ $kost->address->kecamatan }}</p>
                                    <p><span class="font-medium">Desa:</span> {{ $kost->address->desa }}</p>
                                    <p><span class="font-medium">Alamat Lengkap:</span> {{ $kost->alamat_lengkap }}</p>
                                </div>
                            </div>

                            <div>
                                <a href="{{ $kost->gmap }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Buka di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Facilities and Information -->
                    <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                        <div class="p-6 bg-gray-50 rounded-lg">
                            <h4 class="mb-4 text-lg font-semibold text-gray-900">Fasilitas</h4>
                            <div class="prose prose-orange">
                                {!! $kost->fasilitas !!}
                            </div>
                        </div>
                        <div class="p-6 bg-gray-50 rounded-lg">
                            <h4 class="mb-4 text-lg font-semibold text-gray-900">Informasi Tambahan</h4>
                            <div class="prose prose-orange">
                                {!! $kost->informasi !!}
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">Status Kos</h4>
                                <p class="mt-1 text-gray-600">
                                    Status keaktifan kos saat ini
                                </p>
                            </div>
                            <span class="px-4 py-2 text-sm font-medium {{ $kost->aktif ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} rounded-full">
                                {{ $kost->aktif ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
