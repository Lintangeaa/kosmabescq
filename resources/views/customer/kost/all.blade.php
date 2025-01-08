<x-app-layout>
  <main class="px-10 lg:px-40 mt-10">
    <h1 class="text-2xl font-semibold mb-4">Semua Kos yang Tersedia</h1>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
      @foreach($kosts as $kost)
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
  </main>
</x-app-layout>
