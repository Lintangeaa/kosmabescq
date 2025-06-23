<x-app-layout>

    <body class="font-sans antialiased bg-gray-50">
        <!-- Header -->
        <div class="flex sticky top-0 z-20 justify-between items-center px-6 h-20 bg-orange-200 shadow-md sm:px-10 lg:px-28">
            <h1 class="text-xl font-extrabold text-orange-700 uppercase text-ellipsis">Kosmabescq</h1>
        </div>

        <!-- Main Content -->
        <main class=" mx-auto mt-12 max-w-7xl px-6 sm:px-10 lg:px-[36px]  ">
            <!-- Hero Section -->
            <div class="flex flex-col gap-6 justify-center items-center lg:flex-row">
                <img src="/assets/img/hero.jpg" alt="Kosmabescq" class="rounded-lg shadow-lg">
                <div class="flex justify-center items-center p-4 h-auto lg:p-8">
                    <h1 class="text-2xl font-bold text-center text-gray-800 lg:text-3xl lg:text-left">Kosmabescq: Solusi
                        Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
                </div>
            </div>

            <section class="py-8" id="populer">
                <h1 class="text-2xl font-semibold text-center text-gray-800 sm:text-left">
                    Paling <span class="text-orange-500">Populer</span> dan Paling <span
                        class="text-orange-500">Dicari</span>
                </h1>
                <!-- Swiper Container -->
                <div class="mt-5 swiper mySwiper">
                    <div class="swiper-wrapper">
                        @forelse ($kosPopuler as $kost)
                            <div class="transition-all duration-300 cursor-pointer swiper-slide hover:-translate-y-2">
                                <a href="{{ route('customer.kost.show', $kost->id) }}">
                                    <div class="p-2 w-48 h-56 bg-orange-100 rounded-xl hover:shadow-lg">
                                        <img src="{{ asset('storage/' . $kost->image) }}"
                                            class="object-cover w-full h-32 rounded-xl" alt="{{ $kost->nama }}">
                                        <div class="py-2">
                                            <h1 class="font-semibold text-md">{{ $kost->nama }}</h1>
                                            <span class="text-xs text-orange-600">Rp.
                                                {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                                            <span class="block text-xs text-gray-600">Kamar Tersedia:
                                                {{ $kost->kamar_tersedia }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="flex justify-center items-center p-2 w-48 h-56 bg-gray-100 rounded-xl">
                                    <div class="text-center text-gray-500">
                                        <svg class="mx-auto mb-2 w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <p class="text-xs">Belum ada kos populer</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>



            <!-- Kos Kami Section -->
            <section class="py-8" id="hotel">
                <h2 class="mb-4 text-2xl font-bold text-gray-800">Kos Kami</h2>
                <p class="mb-4 text-gray-600">
                    Temukan kenyamanan di berbagai pilihan kos terbaik yang tersedia, dengan fasilitas modern dan harga
                    yang terjangkau.
                </p>

                <!-- Grid Responsif -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse ($kosKami as $kost)
                        <a href="{{ route('customer.kost.show', $kost->id) }}">
                            <div
                                class="p-2 h-full rounded-lg border border-orange-200 transition-all duration-300 hover:bg-orange-200">
                                <img src="{{ asset('storage/' . $kost->image) }}" alt="{{ $kost->nama }}"
                                    class="object-cover w-full h-32 rounded-lg">
                                <div class="py-2">
                                    <h1 class="text-sm font-semibold text-gray-800">{{ $kost->nama }}</h1>
                                    <p class="text-sm text-gray-600">{{ $kost->address->formatted_address }}</p>
                                    <span class="text-sm text-orange-600">Rp.
                                        {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                                    <span class="block text-sm text-gray-600">Kamar Tersedia:
                                        {{ $kost->kamar_tersedia }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-8 text-center">
                            <div class="text-gray-500">
                                <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kos tersedia</h3>
                                <p class="mt-1 text-sm text-gray-500">Kos akan tampil di sini ketika sudah tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Link Lihat Lebih Banyak -->
                <a href="{{ route('customer.kost.all') }}"
                    class="block mt-5 text-center text-orange-500 hover:underline sm:text-left">
                    Lihat lebih banyak Kos
                </a>
            </section>

        </main>

        <x-footer />
    </body>
</x-app-layout>
