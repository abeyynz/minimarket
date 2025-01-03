

<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="bg-[#378bf1] font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
        <!-- Navigasi ke Halaman Produk dan Kategori -->
        <nav class="flex mt-4 space-x-4">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-black rounded-lg bg-black md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-[#ffffff]">
                <li>
                    <a href="{{ route('categories.index') }}" class="text-green-500 hover:underline">
                        {{ __('Daftar Kategori') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="text-green-500 hover:underline">
                        {{ __('Produk') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.store') }}" class="text-green-500 hover:underline">
                        {{ __('Tambah Produk') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.index') }}" class="text-green-500 hover:underline">
                        {{ __('Transaksi') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.history') }}" class="text-green-500 hover:underline">
                        {{ __('Riwayat Transaksi') }}
                    </a>
                </li>
            </ul>
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
