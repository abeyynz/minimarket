<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center space-x-4">
            <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-2xl text-green-500 font-bold">Tambah Kategori</h1>
        </div>
    </x-slot>

    <main class="flex-grow container mx-auto mt-6 px-4">
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6 max-w-md mx-auto">
            @csrf
            <div>
                <label for="code" class="block text-gray-700">Kode Kategori</label>
                <input type="text" name="code" id="code" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Kode Kategori">
            </div>
            <div>
                <label for="name" class="block text-gray-700">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Nama Kategori">
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Tambah</button>
        </form>

    </main>
</x-app-layout>
