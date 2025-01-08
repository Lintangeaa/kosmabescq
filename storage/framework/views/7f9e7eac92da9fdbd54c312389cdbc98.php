<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Reservasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-details {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .invoice-details th {
            background-color: #f4f4f4;
        }
        .invoice-footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h2>Invoice Reservasi</h2>
        <p><?php echo e($reservation->kost->nama); ?></p>
    </div>

    <table class="invoice-details">
        <tr>
            <th>ID Reservasi</th>
            <td><?php echo e($reservation->reservation_id); ?></td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td><?php echo e($reservation->tanggal_reservasi); ?></td>
        </tr>
        <tr>
            <th>Total Bulan</th>
            <td><?php echo e(floor($reservation->total)); ?> Bulan</td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo e($reservation->status); ?></td>
        </tr>
        <tr>
            <th>Total Pembayaran</th>
            <td>Rp <?php echo e(number_format($reservation->total * $reservation->kost->harga, 0, ',', '.')); ?></td>
        </tr>
        <tr>
            <th>Tanggal Pembayaran</th>
            <td><?php echo e($payment->created_at->format('d-m-Y H:i')); ?></td>
        </tr>
    </table>

    <div class="invoice-footer">
        <p>Terima kasih telah melakukan reservasi!</p>
    </div>

</body>
</html>
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/reservations/invoice-pdf.blade.php ENDPATH**/ ?>