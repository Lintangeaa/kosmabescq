<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Daftar Reservasi') }}
      </h2>
  </x-slot>

  <div class="p-12">
      @if($reservations->isEmpty())
          <div class="text-center">
              <p class="text-gray-600">Tidak ada reservasi yang ditemukan.</p>
              <a href="{{ route('customer.kost.index') }}" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Cari Kos</a>
          </div>
      @else
          <div class="overflow-x-auto">
              <table class="min-w-full table-auto bg-white shadow rounded-lg">
                  <thead>
                      <tr>
                          <th class="px-4 py-2 border-b text-left">Nama Kost</th>
                          <th class="px-4 py-2 border-b text-left">Tanggal Mulai</th>
                          <th class="px-4 py-2 border-b text-left">Total Bulan</th>
                          <th class="px-4 py-2 border-b text-left">Status</th>
                          <th class="px-4 py-2 border-b text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($reservations as $reservation)
                          <tr>
                              <td class="px-4 py-2 border-b">{{ $reservation->kost->nama }}</td>
                              <td class="px-4 py-2 border-b">{{ $reservation->tanggal_reservasi }}</td>
                              <td class="px-4 py-2 border-b">{{ floor($reservation->total) }} Bulan</td>
                              <td class="px-4 py-2 border-b">{{ $reservation->status }}</td>
                              <td class="px-4 py-2 border-b text-center">
                                  @if($reservation->status == 'Menunggu Pembayaran')
                                      <a href="{{ route('customer.reservations.payment', $reservation->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Bayar</a>
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      @endif
  </div>
</x-app-layout>
