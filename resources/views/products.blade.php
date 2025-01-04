<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <button 
                onclick="window.location.href='{{ route('products.create') }}'" 
                class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded">
                Tambah Produk
            </button>
        </div>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="border rounded-lg shadow-md p-4 bg-blue-300">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                    <h2 class="text-white font-semibold">{{ $product->name }}</h2>
                    <p class="text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-white">{{ $product->stock }} {{ $product->unit }}</p>
                </div>
            @endforeach
        </div>
    </main>
</x-app-layout>
