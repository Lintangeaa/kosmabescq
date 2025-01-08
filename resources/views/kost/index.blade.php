<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Daftar Kost') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 rounded-xl shadow-lg">
          <div class="flex justify-between items-center mb-4">
              <h1 class="text-lg font-semibold">Daftar Kost</h1>
          </div>
          <div class="mt-2 mb-2">
            <a href="{{ route('kost.create') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Tambah Kost</a>
          </div>
          <table class="w-full table-auto border-collapse border border-gray-300">
              <thead class="bg-gray-200">
                  <tr>
                      <th class="border px-4 py-2">No</th>
                      <th class="border px-4 py-2">Nama</th>
                      <th class="border px-4 py-2">Alamat</th>
                      <th class="border px-4 py-2">Harga</th>
                      <th class="border px-4 py-2">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($kosts as $kost)
                      <tr>
                          <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                          <td class="border px-4 py-2">{{ $kost->nama }}</td>
                          <td class="border px-4 py-2">{{ $kost->address->formatted_address }}</td>
                          <td class="border px-4 py-2">Rp{{ number_format($kost->harga, 2) }}</td>
                          <td class="border px-4 py-2 text-center">
                              <a href="{{ route('kost.edit', $kost->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                              <form action="{{ route('kost.destroy', $kost->id) }}" method="POST" class="inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                              </form>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5" class="border px-4 py-2 text-center">Data tidak tersedia</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
  </div>
</x-app-layout>
