<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('product') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="text-2xl text-blue-400 font-bold dark:text-gray-300 leading-tight">
            {{ __('Tambah Stok') }}
            </h2>
        </div>
    </x-slot>
        <div class="flex-grow container mx-auto mt-6 px-4">

            <form method="post" action="{{ route('product.updateStock', $product->id) }}" enctype="multipart/form-data"
                class="space-y-6 max-w-md mx-auto">
                @method('PATCH')
                @csrf
                <div class="max-w-xl">
                    <x-input-label for="stock" value="Stock" />
                    <x-text-input id="stock" type="number" name="stock" class="mt-1 block w-full" required placeholder="Masukkan jumlah stok"/>
                    <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                </div>

                <x-secondary-button tag="a" href="{{ route('product') }}">Batal</x-secondary-button>
                <x-primary-button value="true">Tambah</x-primary-button>
            </form>

        </div>

</x-app-layout>
