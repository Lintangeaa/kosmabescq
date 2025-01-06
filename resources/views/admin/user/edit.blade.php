<x-app-layout>
  <x-slot name="header">
      <div class="flex w-full justify-between items-center">
          <div class="mt-2 mb-2">
              <a href="{{ route('admin.user.index') }}" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Kembali</a>
          </div>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Edit User') }}
          </h2>
      </div>
  </x-slot>

  <div class="p-12">
      <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="p-5 bg-white rounded-xl shadow-lg">
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

          <!-- Input Password (Opsional untuk Edit) -->
          <x-input 
              label="Password" 
              name="password" 
              type="password" 
              :messages="$errors->get('password')" 
          />

          <!-- Input Konfirmasi Password -->
          <x-input 
              label="Konfirmasi Password" 
              name="password_confirmation" 
              type="password" 
              :messages="$errors->get('password_confirmation')" 
          />

          <!-- Role Selection -->
          <div class="mb-4">
              <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
              <select name="role" id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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