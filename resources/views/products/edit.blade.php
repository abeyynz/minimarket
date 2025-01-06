<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('product.update', ['code' => $product->code]) }}" enctype="multipart/form-data"
                        class="mt-6 space-y6">
                        @method('PATCH')
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="name" value="Nama" />
                            <x-text-input id="name" type="text" name="name" class="mt-1 block w-full"
                                value="{{ old('name', $product->name) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="unit" value="Satuan" />
                            <x-text-input id="unit" type="text" name="unit" class="mt-1 block w-full"
                                value="{{ old('unit', $product->unit) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('unit')" />
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
                            <x-input-label for="image" value="Halaman Sampul Depan" />
                            <x-file-input id="image" name="image" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            <x-text-input type="hidden" name="old_image"value="{{ $product->image }}" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('product') }}">Cancel</x-secondary-button>
                        <x-primary-button value="true">Update</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
