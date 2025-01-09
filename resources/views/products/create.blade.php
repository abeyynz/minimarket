
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('product') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl text-blue-400 dark:text-gray-300 font-semibold">Tambah Produk</h1>
        </div>
    </x-slot>
    <main class="flex-grow container mx-auto mt-6 px-4">
        <form method="post" action="{{ route('product.store') }}" class="space-y-6 max-w-md mx-auto">
            @csrf
            <div class="max-w-xl">
                <x-input-label for="name" value="Nama Produk" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Nama Produk" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="unit" value="Satuan Produk" />
                <x-text-input id="unit" type="text" name="unit" class="w-full p-2 border border-gray-300 rounded" value="{{ old('unit') }}" required min="1" placeholder="Masukkan Satuan Produk" />
                <x-input-error class="mt-2" :messages="$errors->get('unit')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="price" value="Harga Produk" />
                <x-text-input id="price" type="text" name="price" class="w-full p-2 border border-gray-300 rounded" value="{{ old('price') }}" required min="1" placeholder="Masukkan Harga Produk"/>
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="category" value="Kategori Produk" />
                <x-select-input id="category" name="category_id" class="w-full p-2 border border-gray-300 rounded" required >
                    <option value="">Open this select menu</option>
                    @foreach ($categories as $key => $value)
                        @if (old('category_id') == $key)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @endif
                    @endforeach
                </x-select-input>
            </div>
            <div class="max-w-xl">
                <x-input-label for="image_url" value="URL Gambar"/>
                <x-text-input type="text" name="image_url" id="image_url" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan URL gambar"/>
                <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
            </div>
            <x-secondary-button tag="a" href="{{ route('product') }}">Batal</x-secondary-button>
            <x-primary-button value="true">Tambah</x-primary-button>
        </form>
    </main>
</x-app-layout>



