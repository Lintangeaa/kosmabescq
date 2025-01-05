<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservasi Kost') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <form action="{{ route('customer.reservations.store') }}" method="POST" class="p-5 bg-white rounded-xl shadow-lg">
            @csrf

            <!-- Nama Kost -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Kost</label>
                <p class="text-lg font-semibold text-gray-800">{{ $kost->nama }}</p>
            </div>

            <!-- Input Tersembunyi untuk Kost ID -->
            <input type="hidden" name="kost_id" value="{{ $kost->id }}">

            <!-- Input Total -->
            <x-input 
                label="Jumlah Bulan" 
                name="total" 
                type="number" 
                :value="old('total')" 
                :messages="$errors->get('total')" 
                required 
            />

            <!-- Pilihan Tanggal -->
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
