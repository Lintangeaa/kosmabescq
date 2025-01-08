<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Reservasi Kos') }}
        </h2>
    </x-slot>

    <div class="p-6">
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
                            <th class="px-4 py-2 border-b text-left">Nama Pembooking</th> <!-- Kolom nama pembooking -->
                            <th class="px-4 py-2 border-b text-left">Tanggal Mulai</th>
                            <th class="px-4 py-2 border-b text-left">Total Bulan</th>
                            <th class="px-4 py-2 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $reservation->reservation_id }}</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->kost->nama }}</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->user->name }}</td> <!-- Menampilkan nama pembooking -->
                                <td class="px-4 py-2 border-b">{{ $reservation->tanggal_reservasi }}</td>
                                <td class="px-4 py-2 border-b">{{ floor($reservation->total) }} Bulan</td>
                                <td class="px-4 py-2 border-b">{{ $reservation->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>