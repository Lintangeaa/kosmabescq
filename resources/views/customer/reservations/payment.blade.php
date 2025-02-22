<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ config('services.midtrans.url') }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>
<body>

<div class="p-12">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h3 class="text-2xl font-semibold text-gray-800">Detail Reservasi</h3>
        <p class="mt-4 text-gray-600">Nama Kost: {{ $reservation->kost->nama }}</p>
        <p class="mt-2 text-gray-600">Total Pembayaran: <span id="total-payment" class="font-semibold text-xl">Rp. {{ number_format($reservation->total * $reservation->kost->harga) }}</span></p>

        <div class="mt-6">
            <h4 class="text-lg font-semibold text-gray-800">Pembayaran</h4>
            <p class="text-sm text-gray-500 mb-4">Klik tombol di bawah untuk melanjutkan pembayaran.</p>

            @if($reservation->status == 'Menunggu Pembayaran')
                <x-primary-button id="pay-button">
                    Bayar Sekarang
                </x-primary-button>
            @elseif($reservation->status == 'Dibayar')
                <p class="text-green-600 font-semibold">Pembayaran sudah dilakukan.</p>
                <div class="mt-4">
                    <a href="{{ route('customer.reservations.index') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                        Lihat Reservasi
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    document.getElementById('pay-button').addEventListener('click', function() {
        const snapToken = '{{ $snapToken }}';  // Snap Token dari backend
        snap.pay(snapToken, {
            onSuccess: function(result) {
                console.log(result);
                alert('Pembayaran sukses!');
                // Kirim permintaan API untuk memperbarui status
                fetch('/api/reservations/' + {{ $reservation->id }} + '/status', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'status': 'Dibayar'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Redirect setelah pembaruan sukses
                    window.location.href = '{{ route('customer.reservations.index') }}';
                })
                .catch(error => {
                    console.error(error);
                    alert('Terjadi kesalahan dalam memperbarui status pembayaran.');
                });
            },
            onPending: function(result) {
                console.log(result);
                alert('Pembayaran sedang diproses...');
            },
            onError: function(result) {
                console.error(result);
                alert('Terjadi kesalahan dalam pembayaran.');
                // Kirim permintaan API untuk memperbarui status
                fetch('/api/reservations/' + {{ $reservation->id }} + '/status', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'status': 'Dibatalkan'
                    })
                })
            }
        });
    });
</script>

</body>
</html>
