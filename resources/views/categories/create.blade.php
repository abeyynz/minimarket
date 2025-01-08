<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center space-x-4">
            <a href="{{ route('category') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl text-blue-400 dark:text-gray-300 font-semibold">Tambah Kategori</h1>
        </div>
    </x-slot>

    <main class="flex-grow container mx-auto mt-6 px-4">
        <form action="{{ route('category.store') }}" method="POST" class="space-y-6 max-w-md mx-auto">
            @csrf
            <div>
                <x-input-label for="code" value="Kode Kategori"/>
                <x-text-input type="text" name="code" id="code" value="{{ old('code') }}" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Kode Kategori" />
                <x-input-error class="mt-2" :messages="$errors->get('code')" />
            </div>
            <div>
                <x-input-label for="name" value="Nama Kategori" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Nama Kategori" />
                <x-input-error class="mt-2" :messages="$errors->get('code')" />
            </div>
            <x-secondary-button tag="a" href="{{ route('category') }}">Batal</x-secondary-button>
            <x-primary-button value="true">Tambah</x-primary-button>
            
        </form>

    </main>
</x-app-layout>
