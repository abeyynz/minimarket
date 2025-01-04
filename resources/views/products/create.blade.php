
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
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6 max-w-md mx-auto">
            @csrf
            <div>
                <label for="title" class="block text-blue-400 font-bold">Nama Produk</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-200 rounded" required min="1" placeholder="Masukkan nama produk">
            </div>
            <div>
                <label for="qty" class="block text-blue-400 font-bold">Jumlah</label>
                <input type="number" name="qty" id="qty" class="w-full p-2 border border-gray-200 rounded" required min="1" placeholder="Masukkan jumlah produk">
            </div>
            <button type="submit" 
                class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded">
                    Tambah
            </button>
        </form>
    </main>
</x-app-layout>



