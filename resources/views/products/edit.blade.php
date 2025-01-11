<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('product') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-blue-400 dark:text-gray-300 leading-tight">
                {{ __('Product') }}
            </h2>
        </div>
    </x-slot>


    <div class="flex-grow container mx-auto mt-6 px-4">

        <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
            class="space-y-6 max-w-md mx-auto">
            @method('PATCH')
            @csrf
            <div class="max-w-xl">
                <x-input-label for="name" value="Nama" />
                <x-text-input id="name" type="text" name="name" class="mt-1 block w-full"
                    value="{{ old('name', $product->name) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="unit" value="satuan" />
                <x-text-input id="unit" type="text" name="unit" class="mt-1 block w-full"
                    value="{{ old('unit', $product->unit) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('unit')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="stock" value="Stock" />
                <x-text-input id="stock" type="number" name="stock" class="mt-1 block w-full"
                    value="{{ old('stock', $product->stock) }}" required readonly />
                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="price" value="Harga" />
                <x-text-input id="price" type="text" name="price" class="mt-1 block w-full"
                    value="{{ old('price', $product->price) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="category" value="Kategori Rak Buku" />
                <x-select-input id="category" name="category_id" class="mt-1 block w-full" required>
                    <option value="">Open this select menu</option>
                    @foreach ($categories as $key => $value)
                        @if (old('category_id', $product->category_id) == $key)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </x-select-input>
            </div>
            <div class="max-w-xl">
                <x-input-label for="image_url" value="URL Gambar" />
                <x-text-input id="image_url" name="image_url" class="mt-1 block w-full" value="{{ old('image_url', $product->image_url) }}"  />
                <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
            </div>
            <x-secondary-button tag="a" href="{{ route('product') }}">Batal</x-secondary-button>
            <x-primary-button value="true">Perbarui</x-primary-button>
        </form>

    </div>
</x-app-layout>
