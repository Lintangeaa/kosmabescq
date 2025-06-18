<x-app-layout>
  <x-slot name="header">
      <div class="flex items-center justify-between w-full">
          <div class="mt-2 mb-2">
              <a href="{{ route('admin.user.index') }}" class="px-4 py-2 text-black bg-orange-500 rounded hover:bg-orange-600">Kembali</a>
          </div>
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
              {{ __('Edit User') }}
          </h2>
      </div>
  </x-slot>

  <div class="p-12">
      <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="p-5 bg-white shadow-lg rounded-xl">
          @csrf
          @method('PUT')

          <!-- Input Nama -->
          <x-input
              label="Nama"
              name="name"
              type="text"
              :value="old('name', $user->name)"
              :messages="$errors->get('name')"
              required
          />

          <!-- Input Email -->
          <x-input
              label="Email"
              name="email"
              type="email"
              :value="old('email', $user->email)"
              :messages="$errors->get('email')"
              required
          />

          <!-- Role Selection -->
          <div class="mb-4">
              <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
              <select name="role" id="role" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                  <option value="Owner" {{ old('role', $user->role) == 'Owner' ? 'selected' : '' }}>Owner</option>
                  <option value="Customer" {{ old('role', $user->role) == 'Customer' ? 'selected' : '' }}>Customer</option>
              </select>
              @error('role')
                  <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
          </div>

          <x-primary-button>UPDATE USER</x-primary-button>
      </form>
  </div>
</x-app-layout>
