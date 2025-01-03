<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl text-green-500 font-bold mb-4">Daftar Produk</h1>
    
        <button 
            onclick="window.location.href='{{ route('products.create') }}'" 
            class="bg-green-500 hover:bg-green-300 text-white py-2 px-4 rounded">
            Tambah Produk
        </button>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="border rounded-lg shadow-md p-4">
                    <img src="{{ $product->image_url ?? 'https://laz-img-sg.alicdn.com/p/70300cdf0753a65bc1872971599c0f6e.jpg'}}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-500">{{ $product->stock }} pcs</p>
                </div>
            @endforeach
        </div>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name" class="block font-medium">Nama Kategori:</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
            <label for="text" class="block font-medium">Kode Kategori:</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Simpan</button>
        </form>
    </main>
</x-app-layout>