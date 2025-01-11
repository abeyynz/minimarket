<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">
                        <a href="{{ route('history') }}" class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in hover:scale-105 transition transform duration-300">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Report</h3>
                            <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                                {{ 'Transaksi' }}
                            </div>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Laporan Transaksi Cabang</p>
                        </a>

                        <a href="{{ route('history') }}" class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in hover:scale-105 transition transform duration-300">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Report</h3>
                            <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                                {{ 'Stock' }}
                            </div>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Riwayat Stock Gudang</p>
                        </a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @hasrole('owner')
                    <x-primary-button tag="a" href="{{ route('store.create') }}" class="mb-6">
                        Tambah Cabang
                    </x-primary-button>
                    <x-primary-button tag="a" href="{{ route('user.create') }}" class="mb-6">
                        Tambah Manager
                    </x-primary-button>
                    @endhasrole

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($stores as $store)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-2xl hover:shadow-3xl transform transition-all duration-300 overflow-hidden">
                                <a href="{{ route('dashboard.store', $store->id) }}" class="block">
                                    <div class="overflow-hidden h-48 bg-gray-300 dark:bg-gray-600 mb-4">
                                        <img src="{{ $store->image_url }}" alt="{{ $store->name }}" class="w-full h-full object-cover object-center rounded-t-lg">
                                    </div>

                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $store->name }}</h3>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $store->location }}</p>
                                    </div>

                                    @hasrole('owner')
                                    <div class="p-4 bg-gray-50 dark:bg-gray-800 flex justify-between items-center border-t border-gray-200 dark:border-gray-600">
                                        <x-primary-button tag="a" href="{{ route('store.edit', $store->id) }}" class="text-sm">
                                            Edit
                                        </x-primary-button>
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-store-deletion')"
                                            x-on:click="$dispatch('set-action', '{{ route('store.destroy', $store->id) }}')"
                                            class="text-sm ml-auto">
                                            {{ __('Hapus Cabang') }}
                                        </x-danger-button>
                                    </div>

                                    @endhasrole
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <x-modal name="confirm-store-deletion" focusable maxWidth="xl">
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
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Delete!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
