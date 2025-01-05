<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Daftar Pengguna') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 rounded-xl shadow-lg">
          <div class="flex justify-between items-center mb-4">
              <h1 class="text-lg font-semibold">Daftar Pengguna</h1>
          </div>
          <div class="mt-2 mb-2">
            <a href="{{ route('admin.user.create') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Tambah Pengguna</a>
          </div>
          <table class="w-full table-auto border-collapse border border-gray-300">
              <thead class="bg-gray-200">
                  <tr>
                      <th class="border px-4 py-2">No</th>
                      <th class="border px-4 py-2">Nama</th>
                      <th class="border px-4 py-2">Email</th>
                      <th class="border px-4 py-2">Role</th>
                      <th class="border px-4 py-2">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($users as $user)
                      <tr>
                          <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                          <td class="border px-4 py-2">{{ $user->name }}</td>
                          <td class="border px-4 py-2">{{ $user->email }}</td>
                          <td class="border px-4 py-2">{{ $user->role }}</td>
                          <td class="border px-4 py-2 text-center">
                              <a href="{{ route('admin.user.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                              <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
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
