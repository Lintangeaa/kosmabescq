<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-10 lg:px-40 z-50">
            <h1 class="text-xl uppercase font-extrabold text-ellipsis">hotel de luni</h1>
            <i class="fa-solid fa-magnifying-glass hover:text-orange-700 cursor-pointer transition-all duration-300"></i>
        </div>
        <main class="px-10 lg:px-40 mt-5 h-full">
            <div class="grid lg:grid-cols-2">
                <img src="/assets/img/hero.jpg" alt="Hotel De Luni">
                <div class="h-auto flex justify-center items-center p-4 lg:p-8">
                    <h1 class="text-2xl font-bold">Hotel De Luni: Solusi Mudah untuk Semua Kebutuhan Pemesanan Hotel Anda!</h1>
                </div>
            </div>
            <section class="py-8" id="populer">
                <h1 class="text-2xl font-semibold">Paling <span class="text-orange-500">Populer</span> dan Paling <span class="text-orange-500">Dicari</span></h1>
                <div class="swiper-container mt-5">
                    <div class="swiper-wrapper">
                        <a href="" class="swiper-slide hover:-translate-y-2 transition-all duration-300">
                            <div class="w-48 bg-orange-100 h-56 rounded-xl p-2">
                                <img src="/assets/img/hotel1.jpg" class="h-32 w-full rounded-xl" alt="Hotel De Luni">
                                <div class="py-2">
                                    <h1 class="text font-semibold">Hotel De Luni</h1>
                                    @php
                                        $rating = 4;
                                    @endphp
                                    <div class="text-yellow-500 text-xs">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-gray-700">{{ $rating }}</span>
                                    </div>
                                    <span class="text-xs">Rp. 250.000 /malam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="py-8" id="hotel">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Hotel</h2>
                    <p class="mb-4">Temukan kenyamanan dan kemewahan di hotel-hotel pilihan kami. Dengan berbagai fasilitas modern dan layanan premium, hotel kami menawarkan pengalaman menginap yang tak terlupakan. Cocok untuk perjalanan bisnis maupun liburan, setiap hotel kami menyediakan kamar yang elegan dan layanan pelanggan yang memuaskan.</p>
                    <div class="grid grid-cols-4 gap-4">
                        <a href="/">
                        <div class="h-56 hover:bg-orange-200 p-2 rounded-lg transition-all duration-300">
                                <img src="/assets/img/hotel1.jpg" alt="Hotel De Luni" class="h-2/3 w-full rounded-lg">
                                <div class="py-2">
                                    <h1 class="text font-semibold">Hotel De Luni</h1>
                                    @php
                                        $rating = 4;
                                    @endphp
                                    <div class="text-yellow-500 text-xs">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-gray-700">{{ $rating }}</span>
                                    </div>
                                    <span class="text-xs">Rp. 250.000 /malam</span>
                                </div>
                            </div>
                        </a>
                        <a href="/">
                            <div class="h-56 hover:bg-orange-200 p-2 rounded-lg transition-all duration-300">
                                <img src="/assets/img/hotel1.jpg" alt="Hotel De Luni" class="h-2/3 w-full rounded-lg">
                                <div class="py-2">
                                    <h1 class="text font-semibold">Hotel De Luni</h1>
                                    @php
                                        $rating = 4;
                                    @endphp
                                    <div class="text-yellow-500 text-xs">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-gray-700">{{ $rating }}</span>
                                    </div>
                                    <span class="text-xs">Rp. 250.000 /malam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="/hotel" class="text-orange-500 hover:underline mt-5">Lihat lebih banyak hotel</a>
                </div>
            </section>
            <section class="py-8" id="vila">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4"><span class="text-orange-500">V</span>ila</h2>
                    <p class="mb-4">Nikmati ketenangan dan privasi di vila-vila eksklusif kami. Didesain untuk memberikan kenyamanan seperti di rumah, vila kami menawarkan ruang yang luas, pemandangan indah, dan fasilitas pribadi yang lengkap. Ideal untuk liburan keluarga atau kelompok, setiap vila memberikan suasana yang menyegarkan dan nyaman.</p>
                    <div class="grid grid-cols-4 gap-4 mb-5">
                    <a href="/">
                            <div class="h-56 hover:bg-orange-200 p-2 rounded-lg transition-all duration-300">
                                <img src="/assets/img/hotel1.jpg" alt="Hotel De Luni" class="h-2/3 w-full rounded-lg">
                                <div class="py-2">
                                    <h1 class="text font-semibold">Hotel De Luni</h1>
                                    @php
                                        $rating = 4;
                                    @endphp
                                    <div class="text-yellow-500 text-xs">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-gray-700">{{ $rating }}</span>
                                    </div>
                                    <span class="text-xs">Rp. 250.000 /malam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="/vila" class="text-orange-500 hover:underline">Lihat lebih banyak vila</a>
                </div>
            </section>
            <section class="py-8" id="guest-house">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold mb-4">Guest House</h2>
                    <p class="mb-4">Rasakan kehangatan dan keramahan di guest house kami yang nyaman. Dengan suasana yang ramah dan harga yang terjangkau, guest house kami merupakan pilihan ideal bagi pelancong yang mencari pengalaman menginap yang bersahabat dan menyenangkan. Setiap guest house dirancang untuk memberikan pelayanan pribadi dan kenyamanan sederhana.</p>
                    <div class="grid grid-cols-4 gap-4 mb-5">
                    <a href="/">
                            <div class="h-56 hover:bg-orange-200 p-2 rounded-lg transition-all duration-300">
                                <img src="/assets/img/hotel1.jpg" alt="Hotel De Luni" class="h-2/3 w-full rounded-lg">
                                <div class="py-2">
                                    <h1 class="text font-semibold">Hotel De Luni</h1>
                                    @php
                                        $rating = 4;
                                    @endphp
                                    <div class="text-yellow-500 text-xs">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-gray-700">{{ $rating }}</span>
                                    </div>
                                    <span class="text-xs">Rp. 250.000 /malam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="/guest-house" class="text-orange-500 hover:underline">Lihat lebih banyak guest house</a>
                </div>
            </section>
        </main>
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-start md:items-center">
                <!-- About Section -->
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">Hotel De Luni</h3>
                    <p class="text-gray-400">Menawarkan pengalaman menginap yang tak terlupakan dengan berbagai pilihan akomodasi yang nyaman dan elegan.</p>
                </div>
                
                <div class="mb-4 md:mb-0">
                    <h4 class="text-lg font-semibold mb-2">Links</h4>
                    <ul>
                        <li><a href="/" class="hover:underline">Beranda</a></li>
                        <li><a href="/hotel" class="hover:underline">Hotel</a></li>
                        <li><a href="/vila" class="hover:underline">Vila</a></li>
                        <li><a href="/guest-house" class="hover:underline">Guest House</a></li>
                        <li><a href="/contact" class="hover:underline">Kontak</a></li>
                    </ul>
                </div>

                <div class="mb-4 md:mb-0">
                    <h4 class="text-lg font-semibold mb-2">Kontak Kami</h4>
                    <p class="text-gray-400">Alamat: Jl. Contoh No. 123, Jakarta, Indonesia</p>
                    <p class="text-gray-400">Telepon: (021) 1234-5678</p>
                    <p class="text-gray-400">Email: info@hoteldeluni.com</p>
                </div>

                <div class="flex space-x-4">
                    <a href="https://facebook.com" class="text-gray-400 hover:text-white" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" class="text-gray-400 hover:text-white" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" class="text-gray-400 hover:text-white" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" class="text-gray-400 hover:text-white" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="text-center mt-6 border-t border-gray-700 pt-4">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Hotel De Luni. All rights reserved.</p>
            </div>
        </footer>

    </body>
</html>
