<x-app-layout>
    <body class="font-sans antialiased bg-gray-50">
      <!-- Header -->
      <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-10 lg:px-40 z-20 shadow-md">
        <h1 class="text-xl uppercase font-extrabold text-ellipsis text-orange-700">Kosmabescq</h1>
        <div class="flex items-center space-x-6">
          <a href="{{ route('customer.kost.all') }}" class="text-sm text-orange-600 hover:text-orange-700">Lihat Semua Kost</a>
        </div>
      </div>
  
      <!-- Main Content -->
      <main class="px-10 lg:px-40 mt-10">
        <!-- Hero Section -->
        <div class="grid lg:grid-cols-2 gap-10">
          <img src="/assets/img/hero.jpg" alt="Kosmabescq" class="rounded-lg shadow-lg">
          <div class="h-auto flex justify-center items-center p-4 lg:p-8">
            <h1 class="text-3xl font-bold text-gray-800">Kosmabescq: Solusi Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
          </div>
        </div>
  
        <!-- Kos Populer Section -->
        <section class="py-8" id="populer">
          <h1 class="text-2xl font-semibold text-gray-800">
            Paling <span class="text-orange-500">Populer</span> dan Paling <span class="text-orange-500">Dicari</span>
          </h1>
          <div class="swiper-container mt-5">
            <div class="swiper-wrapper">
              @foreach($kosPopuler as $kost)
                <a href="{{ route('customer.kost.show', $kost->id) }}" class="swiper-slide hover:-translate-y-2 transition-all duration-300">
                  <div class="w-48 bg-orange-100 h-56 rounded-xl p-2 hover:shadow-lg">
                    <img src="{{ asset('storage/'.$kost->image) }}" class="h-32 w-full rounded-xl object-cover" alt="{{ $kost->nama }}">
                    <div class="py-2">
                      <h1 class="text-md font-semibold">{{ $kost->nama }}</h1>
                      <span class="text-xs text-orange-600">Rp. {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                      <span class="block text-xs text-gray-600">Kamar Tersedia: {{ $kost->kamar_tersedia }}</span>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        </section>
  
        <!-- Kos Kami Section -->
        <section class="py-8" id="hotel">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">Kos Kami</h2>
          <p class="mb-4 text-gray-600">Temukan kenyamanan di berbagai pilihan kos terbaik yang tersedia, dengan fasilitas modern dan harga yang terjangkau.</p>
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($kosKami as $kost)
              <a href="{{ route('customer.kost.show', $kost->id) }}">
                <div class="h-full hover:bg-orange-200 p-2 rounded-lg transition-all duration-300 border border-orange-200">
                  <img src="{{ asset('storage/'.$kost->image) }}" alt="{{ $kost->nama }}" class="h-32 w-full rounded-lg object-cover">
                  <div class="py-2">
                    <h1 class="text-xs font-semibold text-gray-800">{{ $kost->nama }}</h1>
                    <p class="text-xs text-gray-600">{{ $kost->address->formatted_address }}</p>
                    <span class="text-xs text-orange-600">Rp. {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                    <span class="block text-xs text-gray-600">Kamar Tersedia: {{ $kost->kamar_tersedia }}</span>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
          <a href="{{ route('customer.kost.all') }}" class="text-orange-500 hover:underline mt-5">Lihat lebih banyak Kos</a>
        </section>
      </main>
  
      <!-- Footer -->
      <footer class="bg-gray-800 text-white py-8 mt-10">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-start md:items-center">
          <div class="mb-4 md:mb-0">
            <h3 class="text-xl font-bold text-orange-400 mb-2">Kosmabescq</h3>
            <p class="text-gray-400">Menawarkan pengalaman menginap yang tak terlupakan dengan berbagai pilihan akomodasi yang nyaman dan elegan.</p>
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
          <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Kosmabescq. All rights reserved.</p>
        </div>
      </footer>
    </body>
  </x-app-layout>
  