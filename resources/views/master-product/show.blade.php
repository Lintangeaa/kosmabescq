<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto">
            <h3 class="text-2xl font-bold mb-4">{{ $product->name }}</h3>

            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Room:</strong> {{ $product->room }}</p>
            <p><strong>Location:</strong> {{ $product->location }}</p>
            <p><strong>Category:</strong> {{ ucfirst($product->category) }}</p>

            <div class="mt-4">
                <h4 class="text-lg font-semibold">Facilities:</h4>
                {!! $product->facilities !!}
            </div>

            <div class="mt-4">
                <h4 class="text-lg font-semibold">Terms and Conditions:</h4>
                {!! $product->terms_conditions !!}
            </div>

            <div class="mt-4">
                <h4 class="text-lg font-semibold">Surrounding Places:</h4>
                {!! $product->surrounding_places !!}
            </div>

            <div class="mt-4">
                <h4 class="text-lg font-semibold">Images:</h4>
                @foreach ($product->images as $image)
                <img src="{{ Storage::url($image->image_path) }}" alt="Image" class="w-1/4 h-auto">
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>