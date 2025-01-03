<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Tambah Kategori</h1>
     
    </x-slot>

    <main class="container mx-auto mt-6 px-4">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="code" class="block text-gray-700">Kode Kategori</label>
                <input type="text" name="code" id="code" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Kode Kategori">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Nama Kategori">
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Simpan</button>
        </form>

    </main>
</x-app-layout>
