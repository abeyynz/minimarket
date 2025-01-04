
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl text-blue-400 font-bold">Tambah Produk</h1>
        </div>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-4 max-w-md mx-auto">
        @csrf
            <div>
                <label for="code" class="block text-blue-400 font-bold">Kode Produk</label>
                <input type="text" name="code" id="code" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan kode produk, contoh: AT001">
            </div>
            <div>
                <label for="name" class="block text-blue-400 font-bold">Nama Produk</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan nama produk">
            </div>
            <div>
                <label for="price" class="block text-blue-400 font-bold">Harga</label>
                <input type="text" name="price" id="price" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan harga produk">
            </div>
            <div>
                <label for="unit" class="block text-blue-400 font-bold">Satuan</label>
                <input type="text" name="unit" id="unit" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan satuan produk (misal pcs)">
            </div>
            <div>
                <label for="category_id" class="block text-blue-400 font-bold">ID Kategori</label>
                <input type="number" name="category_id" id="category_id" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan ID kategori">
            </div>
            <div>
                <label for="image_url" class="block text-blue-400 font-bold">URL Gambar</label>
                <input type="text" name="image_url" id="image_url" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan URL gambar">
            </div>
            <button type="submit" 
                class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded">
                    Tambah
            </button>
        </form>

    </main>
</x-app-layout>



