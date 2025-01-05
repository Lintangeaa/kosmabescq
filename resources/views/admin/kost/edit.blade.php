<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between items-center">
            <div class="mt-2 mb-2">
                <a href="{{ route('kost.index') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Kembali</a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Kost') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-12">
        <form action="{{ route('kost.update', $kost->id) }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white rounded-xl shadow-lg">
            @csrf
            @method('PUT') <!-- Add method spoofing for PUT request -->
            
            <x-input 
                label="Nama Kost" 
                name="nama" 
                type="text" 
                :value="old('nama', $kost->nama)" 
                :messages="$errors->get('nama')" 
                required 
            />
            <x-input 
                label="Provinsi" 
                name="provinsi" 
                type="text" 
                :value="old('provinsi', $kost->address->provinsi)" 
                :messages="$errors->get('provinsi')" 
                required 
            />
            <x-input 
                label="Kota" 
                name="kota" 
                type="text" 
                :value="old('kota', $kost->address->kota)" 
                :messages="$errors->get('kota')" 
                required 
            />
            <x-input 
                label="Kecamatan" 
                name="kecamatan" 
                type="text" 
                :value="old('kecamatan', $kost->address->kecamatan)" 
                :messages="$errors->get('kecamatan')" 
                required 
            />
            <x-input 
                label="Desa" 
                name="desa" 
                type="text" 
                :value="old('desa', $kost->address->desa)" 
                :messages="$errors->get('desa')" 
                required 
            />
            <x-input 
                label="Alamat Lengkap" 
                name="alamat_lengkap" 
                type="text" 
                :value="old('alamat_lengkap', $kost->alamat_lengkap)" 
                :messages="$errors->get('alamat_lengkap')" 
                required 
            />

            <x-input 
                label="Harga" 
                name="harga" 
                type="number" 
                :value="old('harga', $kost->harga)" 
                :messages="$errors->get('harga')" 
                required 
            />

            <x-input 
                label="Jumlah Kamar" 
                name="total_kamar" 
                type="number" 
                :value="old('total_kamar', $kost->total_kamar)" 
                :messages="$errors->get('total_kamar')" 
                required 
            />

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Foto Utama</label>
                <!-- Show the current image if it exists -->
                @if ($kost->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $kost->image) }}" alt="Main Image" class="w-full h-auto mb-2">
                        <p class="text-sm text-gray-600">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                @error('image')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fasilitas" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                <textarea
                    name="fasilitas"
                    id="fasilitas"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('fasilitas', $kost->fasilitas) }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#fasilitas',
                        plugins: 'image',
                        toolbar: 'image',
                        image_resizing: true,
                    });
                </script>
            </div>

            <div class="mb-4">
                <label for="informasi" class="block text-sm font-medium text-gray-700">Informasi Tambahan</label>
                <textarea
                    name="informasi"
                    id="informasi"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('informasi', $kost->informasi) }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#informasi', 
                        plugins: 'image',
                        toolbar: 'image',
                        image_resizing: true,
                    });
                </script>
            </div>

            <x-primary-button>UPDATE</x-primary-button>
        </form>
    </div>
</x-app-layout>
