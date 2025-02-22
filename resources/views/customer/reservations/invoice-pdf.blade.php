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
        <p>{{ $reservation->kost->nama }}</p>
    </div>

    <table class="invoice-details">
        <tr>
            <th>ID Reservasi</th>
            <td>{{ $reservation->reservation_id }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ $reservation->tanggal_reservasi }}</td>
        </tr>
        <tr>
            <th>Total Bulan</th>
            <td>{{ floor($reservation->total) }} Bulan</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $reservation->status }}</td>
        </tr>
        <tr>
            <th>Total Pembayaran</th>
            <td>Rp {{ number_format($reservation->total * $reservation->kost->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tanggal Pembayaran</th>
            <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <div class="invoice-footer">
        <p>Terima kasih telah melakukan reservasi!</p>
    </div>

</body>
</html>
