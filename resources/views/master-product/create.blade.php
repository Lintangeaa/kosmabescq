<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('master-product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form-input type="text" name="name" value="{{ old('name') }}" required />
            <x-form-input type="number" name="price" value="{{ old('price') }}" required />
            <x-form-input type="number" name="room" value="{{ old('room') }}" required />
            <x-form-input type="text" name="location" value="{{ old('location') }}" required />

            <x-form-input
                type="select"
                name="category"
                :options="[
                    'hotel' => 'Hotel',
                    'guest-house' => 'Guest House',
                    'villa' => 'Villa',
                ]"
                value="{{ old('category') }}"
                required />

            <x-form-input type="file" name="images" multiple />

            <div class="mb-4">
                <label for="facilities" class="block text-sm font-medium text-gray-700">Facilities:</label>
                <textarea
                    name="facilities"
                    id="facilities"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('facilities') }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#facilities'
                    });
                </script>
            </div>

            <div class="mb-4">
                <label for="terms_conditions" class="block text-sm font-medium text-gray-700">Terms and Conditions:</label>
                <textarea
                    name="terms_conditions"
                    id="terms_conditions"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('terms_conditions') }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#terms_conditions'
                    });
                </script>
            </div>

            <div class="mb-4">
                <label for="surrounding_places" class="block text-sm font-medium text-gray-700">Surrounding Places:</label>
                <textarea
                    name="surrounding_places"
                    id="surrounding_places"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('surrounding_places') }}</textarea>
                <script>
                    tinymce.init({
                        selector: '#surrounding_places'
                    });
                </script>
            </div>

            <x-primary-button>Create Product</x-primary-button>
        </form>
    </div>
</x-app-layout>