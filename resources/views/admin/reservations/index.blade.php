<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Reservasi Kos') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <!-- Menambahkan legenda status dengan penjelasan -->
        <div class="mb-6 bg-gray-100 p-4 rounded-lg shadow-md">
            <p class="font-semibold text-lg text-gray-700 mb-2">Keterangan:</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Menunggu Pembayaran -->
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-indigo-600"></span>
                    <div>
                        <span class="text-gray-700">Menunggu Pembayaran</span>
                        <p class="text-sm text-gray-600">Reservasi sedang dalam proses dan menunggu pembayaran dari customer.</p>
                    </div>
                </div>
                <!-- Dibayar -->
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-blue-600"></span>
                    <div>
                        <span class="text-gray-700">Dibayar</span>
                        <p class="text-sm text-gray-600">Pembayaran sudah diterima, tetapi reservasi belum selesai.</p>
                    </div>
                </div>
                <!-- Selesai -->
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-green-600"></span>
                    <div>
                        <span class="text-gray-700">Selesai</span>
                        <p class="text-sm text-gray-600">Semua proses selesai dan customer sudah menempati kost.</p>
                    </div>
                </div>
                <!-- Batal -->
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-red-600"></span>
                    <div>
                        <span class="text-gray-700">Batal</span>
                        <p class="text-sm text-gray-600">Reservasi dibatalkan dan tidak akan dilanjutkan.</p>
                    </div>
                </div>
            </div>
        </div>

        @if($reservations->isEmpty())
            <div class="text-center">
                <p class="text-gray-600">Tidak ada reservasi untuk kos Anda.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white shadow rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left">ID Reservasi</th>
                            <th class="px-4 py-2 border-b text-left">Nama Kost</th>
                            <th class="px-4 py-2 border-b text-left">Nama Pembooking</th>
                            <th class="px-4 py-2 border-b text-left">Tanggal Mulai</th>
                            <th class="px-4 py-2 border-b text-left">Total Bulan</th>
                            <th class="px-4 py-2 border-b text-left">Status</th>
                            <th class="px-4 py-2 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $reservation->reservation_id }}</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->kost->nama }}</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->user->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->tanggal_reservasi }}</td>
                                <td class="px-4 py-2 border-b">{{ floor($reservation->total) }} Bulan</td>
                                <td class="px-4 py-2 border-b">
                                    <!-- Status dengan warna yang berbeda -->
                                    <span class="px-2 py-1 rounded-full text-white
                                        @if($reservation->status == 'Menunggu Pembayaran') bg-indigo-600
                                        @elseif($reservation->status == 'Dibayar') bg-blue-600
                                        @elseif($reservation->status == 'Selesai') bg-green-600
                                        @elseif($reservation->status == 'Dibatalkan') bg-red-600
                                        @endif">
                                        {{ $reservation->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border-b text-center">
                                    @if($reservation->status == 'Dibayar')
                                        <form action="{{ route('admin.reservations.update-status', $reservation->reservation_id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                
                                            <input type="hidden" name="status" value="Selesai">
                                            
                                            <!-- Tombol untuk mengubah status menjadi Selesai -->
                                            <button type="submit" 
                                                    class="bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 py-1 px-3 text-sm rounded-md transition duration-200 transform hover:scale-105"
                                                    onclick="return confirm('Yakin ingin menyelesaikan reservasi?')">
                                                Selesaikan
                                            </button>
                                        </form>
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
