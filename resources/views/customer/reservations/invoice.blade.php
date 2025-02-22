<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Invoice Reservasi') }}
      </h2>
  </x-slot>

  <div class="p-12">
      <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <h3 class="text-2xl font-semibold text-gray-800">Invoice untuk {{ $reservation->kost->nama }}</h3>
          <p class="text-gray-600 mt-2">ID Reservasi: <span class="font-medium text-gray-800">{{ $reservation->reservation_id }}</span></p>
          <p class="text-gray-600 mt-1">Tanggal Mulai: <span class="font-medium text-gray-800">{{ $reservation->tanggal_reservasi }}</span></p>
          <p class="text-gray-600 mt-1">Total Bulan: <span class="font-medium text-gray-800">{{ floor($reservation->total) }} Bulan</span></p>
          <p class="text-gray-600 mt-1">Status: <span class="font-medium text-gray-800">{{ $reservation->status }}</span></p>
          <p class="text-gray-600 mt-1">Total Pembayaran: <span class="font-medium text-gray-800">Rp {{ number_format($reservation->total * $reservation->kost->harga, 0, ',', '.') }}</span></p>
          <p class="text-gray-600 mt-1">Metode Pembayaran: <span class="font-medium text-gray-800">{{ $payment->payment_method }}</span></p>
          <p class="text-gray-600 mt-1">Tanggal Pembayaran: <span class="font-medium text-gray-800">{{ $payment->created_at->format('d-m-Y H:i') }}</span></p>

          <!-- Tombol Download Invoice -->
          <div class="mt-4 text-center">
              <a href="{{ route('customer.reservations.downloadInvoice', $reservation->reservation_id) }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Download Invoice
              </a>
          </div>
      </div>
  </div>
</x-app-layout>
