<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl text-white font-bold">Daftar Kategori</h1>
            <button 
                onclick="window.location.href='{{ route('categories.create') }}'" 
                class="bg-white hover:bg-blue-200 text-blue-400 hover:text-white py-2 px-4 rounded">
                Tambah Kategori
            </button>
        </div>
    </x-slot>

    <main class="container mx-auto mt-6 px-4">
        <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-blue-300 text-white">
                <tr>
                    <th class="px-4 py-2 text-left border">ID</th>
                    <th class="px-4 py-2 text-left border">Nama Kategori</th>
                    <th class="px-4 py-2 text-left border">Kode Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $category->id }}</td>
                        <td class="px-4 py-2 border">{{ $category->name }}</td>
                        <td class="px-4 py-2 border">{{ $category->code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
