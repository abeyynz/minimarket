
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl text-green-500 font-bold">Tambah Produk</h1>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
                <label for="title" class="block text-gray-700">Nama Produk</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan nama produk">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Deskripsi Produk</label>
                <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan deskripsi produk"></textarea>
            </div>
            <div class="mb-4">
                <label for="qty" class="block text-gray-700">Jumlah</label>
                <input type="number" name="qty" id="qty" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan jumlah produk">
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Simpan</button>
    </form>
    </main>
</x-app-layout>
