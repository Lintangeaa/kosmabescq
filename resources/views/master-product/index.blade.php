<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Product List</h1>
            <a href="{{ route('master-product.create') }}">Create New Product</a>
            <ul>
                @foreach($products as $product)
                <li>
                    <a href="{{ route('master-product.show', $product->id) }}">{{ $product->name }}</a>
                    <p>Price: {{ $product->price }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>