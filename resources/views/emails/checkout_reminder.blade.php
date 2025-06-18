@component('mail::message')
# Hai {{ $reservation->user->name ?? 'Penghuni Kos' }},

Masa tinggal Anda di **{{ $reservation->kost->nama ?? 'Kos' }}** akan **berakhir pada {{ $reservation->tanggal_keluar ? \Carbon\Carbon::parse($reservation->tanggal_keluar)->translatedFormat('d F Y') : 'tanggal yang ditentukan' }}**.

Anda dapat:
- Melakukan **check-out** sebelum tanggal tersebut, **ATAU**
- Memilih untuk **memperpanjang sewa kos** Anda.

Jika Anda ingin mengakhiri sewa, pastikan untuk mengurus proses check-out tepat waktu.

Terima kasih,
{{ config('app.name') }}
@endcomponent
