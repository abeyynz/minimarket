
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
        <form method="post" action="{{ route('product.store') }}" class="mt-6 space-y-6">
            @csrf
            <div class="max-w-xl">
                <label for="name" value="Nama" class="block text-blue-400">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded" required min="1" placeholder="Masukkan Nama Produk">
                <x-input-error class="mt-2" :messages="$errors->get('code')" />
            </div>
            <div class="max-w-xl">
                <label for="unit" value="Satuan" class="block text-blue-400">Satuan Produk</label>
                <input id="unit" type="text" name="unit" class="w-full p-2 border border-gray-300 rounded" value="{{ old('unit') }}" required min="1" placeholder="Masukkan Satuan Produk">
                <x-input-error class="mt-2" :messages="$errors->get('unit')" />
            </div>
            <div class="max-w-xl">
                <label for="price" value="Harga" class="block text-blue-400">Harga</label>
                <input id="price" type="text" name="price" class="w-full p-2 border border-gray-300 rounded" value="{{ old('price') }}" required min="1" placeholder="Masukkan Harga Produk"/>
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div class="max-w-xl">
                <label for="qty" value="Stock" class="block text-blue-400">Stok</label>
                <input id="qty" type="number" name="qty" class="w-full p-2 border border-gray-300 rounded" value="{{ old('stock') }}" required min="1" placeholder="Masukkan Stok Produk"/>
                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
            </div>
            <div class="max-w-xl">
                <label for="category" value="Kategori Produk" class="block text-blue-400">Kategori Produk</label>
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
                <label for="image_url" class="block text-blue-400 font-bold">URL Gambar</label>
                <input type="text" name="image_url" id="image_url" class="w-full p-2 border border-gray-200 rounded" required placeholder="Masukkan URL gambar">
                <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
            </div>
            <button tag="a" href="{{ route('product') }}" class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded">Batal</button>
            <button type="submit" 
                class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded" name="save">
                Tambah
            </button>
        </form>
    </main>
</x-app-layout>



