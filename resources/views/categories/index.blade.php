<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <button 
                onclick="window.location.href='{{ route('category.create') }}'" 
                class="bg-blue-400 dark:bg-blue-900 hover:bg-blue-200 text-white hover:text-white dark:text-white dark:hover:bg-blue-700 py-2 px-4 rounded">
                Tambah Kategori
            </button>
        </div>
    </x-slot>

    <main class="max-w-7xl mx-auto mt-6 px-4">
        <table class="table-auto w-full bg-white border dark:bg-gray-400 border-gray-200 rounded-lg shadow-md">
            <thead class="bg-blue-400 dark:bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-center">ID</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Nama Kategori</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Kode Kategori</th>
                    @hasrole('inventory')
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center">Aksi</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="hover:bg-gray-300">
                        <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border text-center">{{ $category->name }}</td>
                        <td class="px-4 py-2 border text-center">{{ $category->code }}</td>
                        @hasrole('inventory')
                            <td class="px-4 py-2 border border-gray-300 text-center">
                                <x-primary-button tag="a"
                                    href="{{ route('category.edit', $category->id) }}">Ubah</x-primary-button>
                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')"
                                    x-on:click="$dispatch('set-action', '{{ route('category.destroy', $category->id) }}')">{{ __('Hapus') }}</x-danger-button>
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-modal name="confirm-category-deletion" focusable maxWidth="xl">
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
    </main>
</x-app-layout>
