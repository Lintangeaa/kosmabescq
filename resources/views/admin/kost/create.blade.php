<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between items-center">
            <div class="mt-2 mb-2">
                <a href="{{ route('admin.kost.index') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Kembali</a>
              </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Kost') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-12">
        <form action="{{ route('admin.kost.store') }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white rounded-xl shadow-lg">
            @csrf
            <x-input 
                label="Nama Kost" 
                name="nama" 
                type="text" 
                :value="old('nama')" 
                :messages="$errors->get('nama')" 
                required 
            />
            <x-input 
                label="Provinsi" 
                name="provinsi" 
                type="text" 
                :value="old('provinsi')" 
                :messages="$errors->get('provinsi')" 
                required 
            />
            <x-input 
                label="Kota" 
                name="kota" 
                type="text" 
                :value="old('kota')" 
                :messages="$errors->get('kota')" 
                required 
            />
            <x-input 
                label="Kecamatan" 
                name="kecamatan" 
                type="text" 
                :value="old('kecamatan')" 
                :messages="$errors->get('kecamatan')" 
                required 
            />
            <x-input 
                label="Desa" 
                name="desa" 
                type="text" 
                :value="old('desa')" 
                :messages="$errors->get('desa')" 
                required 
            />
            <x-input 
                label="Alamat Lengkap" 
                name="alamat_lengkap" 
                type="text" 
                :value="old('alamat_lengkap')" 
                :messages="$errors->get('alamat_lengkap')" 
                required 
            />

            <x-input 
                label="Link Gmaps" 
                name="gmap" 
                type="text" 
                :value="old('gmap')" 
                :messages="$errors->get('gmap')" 
                required 
            />

            <x-input 
                label="Harga" 
                name="harga" 
                type="number" 
                :value="old('harga')" 
                :messages="$errors->get('harga')" 
                required 
            />

            <x-input 
                label="Jumlah Kamar" 
                name="total_kamar" 
                type="number" 
                :value="old('total_kamar')" 
                :messages="$errors->get('total_kamar')" 
                required 
            />

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Foto Utama</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full" required>
                @error('image')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fasilitas" class="block text-sm font-medium text-gray-700">Fasilitas</label>
                <textarea
                    name="fasilitas"
                    id="fasilitas"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('fasilitas') }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#fasilitas',
                        plugins: 'image lists textalign',
                        toolbar: 'undo redo | bold italic | bullist numlist | alignleft aligncenter alignright | image',
                        image_resizing: true,
                        menubar: false,
                    });
                </script>
            </div>            

            <div class="mb-4">
                <label for="informasi" class="block text-sm font-medium text-gray-700">Informasi Tambahan</label>
                <textarea
                    name="informasi"
                    id="informasi"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('informasi') }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#informasi', 
                        plugins: 'image lists textalign',
                        toolbar: 'undo redo | bold italic | bullist numlist | alignleft aligncenter alignright | image',
                        image_resizing: true,
                        menubar: false,
                    });
                </script>
            </div>

            <x-primary-button>BUAT</x-primary-button>
        </form>
    </div>
</x-app-layout>