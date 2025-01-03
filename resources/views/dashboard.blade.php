

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <!-- Navigasi ke Halaman Produk dan Kategori -->
        <nav class="flex mt-4 space-x-4">
            <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">
                {{ __('Daftar Kategori') }}
            </a>
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">
                {{ __('Produk') }}
            </a>
            <a href="{{ route('products.store') }}" class="text-blue-500 hover:underline">
                {{ __('Tambah Produk') }}
            </a>
            <a href="{{ route('transaksi.index') }}" class="text-blue-500 hover:underline">
                {{ __('Transaksi') }}
            </a>
            <a href="{{ route('transaksi.history') }}" class="text-blue-500 hover:underline">
                {{ __('Riwayat Transaksi') }}
            </a>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
