
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl text-green-500 font-bold">Tambah Produk</h1>
        </div>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6 max-w-md mx-auto">
            @csrf
            <div>
                <label for="title" class="block text-gray-700">Nama Produk</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan nama produk">
            </div>
                <!-- <div class="mb-4">
                    <label for="content" class="block text-gray-700">Deskripsi Produk</label>
                    <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan deskripsi produk"></textarea>
                </div> -->
            <div>
                <label for="qty" class="block text-gray-700">Jumlah</label>
                <input type="number" name="qty" id="qty" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan jumlah produk">
            </div>
            <button type="submit" 
                class="bg-green-500 hover:bg-green-300 text-white py-2 px-4 rounded">
                    Tambah
            </button>
        </form>
    </main>
</x-app-layout>



