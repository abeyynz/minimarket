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
                    @hasrole('owner')
                    <x-primary-button tag="a" href="{{ route('store.create') }}">Tambah Cabang</x-primary-button>
                    @endhasrole
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lokasi</th>
                                @hasrole('owner')
                                <th scope="col">Aksi</th>
                                @endhasrole
                            </tr>
                        </x-slot>
                        @foreach ($stores as $store)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $store->name }}</td>
                                <td>{{ $store->location }}</td>
                                @hasrole('owner')
                                <td>
                                    <x-primary-button tag="a"
                                        href="{{ route('store.edit', $store->id) }}">Edit</x-primary-button>
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-store-deletion')"
                                        x-on:click="$dispatch('set-action', '{{ route('store.destroy', $store->id) }}')">{{ __('Delete') }}</x-danger-button>
                                </td>
                                @endhasrole
                            </tr>
                        @endforeach
                    </x-table>

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
