<x-app-layout>
    <body class="font-sans antialiased bg-gray-50">
      <!-- Header -->
      <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-10 lg:px-40 z-20 shadow-md">
        <h1 class="text-xl uppercase font-extrabold text-ellipsis text-orange-700">Kosmabescq</h1>
      </div>
  
      <!-- Main Content -->
      <main class=" mx-auto mt-12 max-w-7xl px-6 sm:px-10 lg:px-[36px]  ">
        <!-- Hero Section -->
        <div class="flex justify-center items-center gap-6 flex-col lg:flex-row ">
          <img src="/assets/img/hero.jpg" alt="Kosmabescq" class="rounded-lg shadow-lg">
          <div class="h-auto flex justify-center items-center p-4 lg:p-8">
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 text-center lg:text-left ">Kosmabescq: Solusi Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
          </div>
        </div>
  
        <section class="py-8" id="populer">
  <h1 class="text-2xl font-semibold text-gray-800 text-center sm:text-left">
    Paling <span class="text-orange-500">Populer</span> dan Paling <span class="text-orange-500">Dicari</span>
  </h1>
   <!-- Swiper Container -->
   <div class="swiper mySwiper mt-5">
    <div class="swiper-wrapper">
      @foreach($kosPopuler as $kost)
        <div class="swiper-slide hover:-translate-y-2 transition-all duration-300 cursor-pointer">
          <a href="{{ route('customer.kost.show', $kost->id) }}">
            <div class="w-48 bg-orange-100 h-56 rounded-xl p-2 hover:shadow-lg">
              <img src="{{ asset('storage/'.$kost->image) }}" class="h-32 w-full rounded-xl object-cover" alt="{{ $kost->nama }}">
              <div class="py-2">
                <h1 class="text-md font-semibold">{{ $kost->nama }}</h1>
                <span class="text-xs text-orange-600">Rp. {{ number_format($kost->harga, 0, ',', '.') }} /bulan</span>
                <span class="block text-xs text-gray-600">Kamar Tersedia: {{ $kost->kamar_tersedia }}</span>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>


  
        <!-- Kos Kami Section -->
  <section class="py-8" id="hotel">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Kos Kami</h2>
  <p class="mb-4 text-gray-600">
    Temukan kenyamanan di berbagai pilihan kos terbaik yang tersedia, dengan fasilitas modern dan harga yang terjangkau.
  </p>

  <!-- Grid Responsif -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach($kosKami as $kost)
      <a href="{{ route('customer.kost.show', $kost->id) }}">
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

  <!-- Link Lihat Lebih Banyak -->
  <a href="{{ route('customer.kost.all') }}" class="text-orange-500 hover:underline mt-5 block text-center sm:text-left">
    Lihat lebih banyak Kos
  </a>
</section>

      </main>
  
      <x-footer />
    </body>
  </x-app-layout>
  