<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <button
                onclick="window.location.href='{{ route('product.create') }}'"
                class="bg-blue-400 hover:bg-blue-300 text-white hover:text-white py-2 px-4 rounded">
                Tambah Produk
            </button>
        </div>
    </x-slot>
        <div class="max-w-7xl mx-auto mt-6 px-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div class="border rounded-lg shadow-md p-3 bg-blue-300">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-52 object-cover mb-4">
                                <div class="p-2">
                                    <h2 class="text-lg font-semibold text-gray-900  text-center">{{ $product->name }}</h2>
                                    <p class="text-gray-600 dark:text-gray-900 mt-2">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <p class="text-gray-600 dark:text-gray-900 mt-1">Stock: {{ $product->stock }} {{ $product->unit }}</p>
                                </div>
                                <div class="flex items-center space-x-2 ">
                                    <x-primary-button tag="a" href="{{ route('product.edit', $product->id) }}"  class=" px-4 text-sm">
                                        Ubah
                                    </x-primary-button>
                                    <x-primary-button tag="a" href="{{ route('product.addStock',  $product->id) }}" class="py-2 px-4 text-sm text-center">
                                        Tambah Stock
                                    </x-primary-button>
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')"
                                        x-on:click="$dispatch('set-action', '{{ route('product.destroy', $product->id) }}')"  class="py-2 px-4 text-sm mr-5">
                                        {{ __('Hapus') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <x-modal name="confirm-product-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @method('delete')
                            @csrf
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilaksanakan. Data akan dihilangkan secara permanen.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Hapus!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>

</x-app-layout>
