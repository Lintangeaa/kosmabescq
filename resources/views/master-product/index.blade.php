<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-2 rounded-xl shadow-lg">
            <div class="flex justify-between items-center">
                <h1 class="text-lg font-semibold">List Penginapan</h1>
                <a class="bg-orange-500 p-1 rounded px-2 text-white hover:text-orange-500 hover:bg-white border hover:border-orange-500 transition-all duration-300" href="{{ route('master-product.create') }}">Tambah</a>
            </div>
            <table class="w-full overflow-x-auto mt-5">
                <thead>
                    <th>
                        No
                    </th>
                    <th>
                        Nama Penginapan</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><a href="{{ route('master-product.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td class="text-center">{{ $product->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>