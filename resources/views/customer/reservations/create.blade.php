<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Reservasi Kost') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <form action="{{ route('customer.reservations.store') }}" method="POST" class="p-5 bg-white shadow-lg rounded-xl">
            @csrf

            <!-- Nama Kost -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Kost</label>
                <p class="text-lg font-semibold text-gray-800">{{ $kost->nama }}</p>
            </div>

            <!-- Input Tersembunyi untuk Kost ID -->
            <input type="hidden" name="kost_id" value="{{ $kost->id }}">

            <!-- Input Alamat -->
            <x-input
                label="Alamat Lengkap"
                name="alamat"
                type="text"
                :value="old('alamat', auth()->user()->alamat ?? '')"
                :messages="$errors->get('alamat')"
                required
                placeholder="Masukkan alamat lengkap Anda"
            />

            <!-- Input No HP -->
            <x-input
                label="Nomor HP"
                name="no_hp"
                type="text"
                :value="old('no_hp', auth()->user()->no_hp ?? '')"
                :messages="$errors->get('no_hp')"
                required
                placeholder="Contoh: 08123456789"
            />

            <!-- Input Total -->
            <x-input
                label="Jumlah Bulan"
                name="total"
                type="number"
                :value="old('total')"
                :messages="$errors->get('total')"
                required
                min="1"
            />

            <!-- Pilihan Tanggal Mulai -->
            <x-input
                label="Tanggal Mulai"
                name="start_date"
                type="date"
                :value="old('start_date')"
                :messages="$errors->get('start_date')"
                required
            />

            <x-primary-button>Submit Reservasi</x-primary-button>
        </form>
    </div>
</x-app-layout>
