<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('services.midtrans.client_key')); ?>"></script>
</head>
<body>

<div class="p-12">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h3 class="text-2xl font-semibold text-gray-800">Detail Reservasi</h3>
        <p class="mt-4 text-gray-600">Nama Kost: <?php echo e($reservation->kost->nama); ?></p>
        <p class="mt-2 text-gray-600">Total Pembayaran: <span id="total-payment" class="font-semibold text-xl">Rp. <?php echo e(number_format($reservation->total * $reservation->kost->harga)); ?></span></p>

        <div class="mt-6">
            <h4 class="text-lg font-semibold text-gray-800">Pembayaran</h4>
            <p class="text-sm text-gray-500 mb-4">Klik tombol di bawah untuk melanjutkan pembayaran.</p>

            <button id="pay-button" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 w-full">
                Bayar Sekarang
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('pay-button').addEventListener('click', function() {
        const snapToken = '<?php echo e($snapToken); ?>';  // Snap Token dari backend
        snap.pay(snapToken, {
            onSuccess: function(result) {
                console.log(result);
                alert('Pembayaran sukses!');
                // Kirim permintaan API untuk memperbarui status
                fetch('/reservations/' + <?php echo e($reservation->id); ?> + '/status', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Redirect setelah pembaruan sukses
                    window.location.href = '<?php echo e(route('customer.reservations.index')); ?>';
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
            }
        });
    });
</script>

</body>
</html>
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/reservations/payment.blade.php ENDPATH**/ ?>