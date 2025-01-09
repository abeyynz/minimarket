<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @hasrole('manager')
                    <x-primary-button tag="a" href="{{ route('user.create') }}" class="mb-6 bg-gradient-to-r from-green-400 to-teal-500 hover:from-teal-500 hover:to-green-400 transition duration-300 text-white">
                        Tambah Akun
                    </x-primary-button>
                    @endhasrole

                    <div class="overflow-x-auto shadow-xl rounded-lg">
                        <x-table class="table-auto w-full text-sm text-gray-900 dark:text-gray-100">
                            <x-slot name="header">
                                <tr class="bg-green-500 text-white">
                                    <th scope="col" class="px-4 py-2">#</th>
                                    <th scope="col" class="px-4 py-2">Nama</th>
                                    <th scope="col" class="px-4 py-2">Username</th>
                                    <th scope="col" class="px-4 py-2">Email</th>
                                    <th scope="col" class="px-4 py-2">Cabang</th>
                                    <th scope="col" class="px-4 py-2">Aksi</th>
                                </tr>
                            </x-slot>

                            @foreach ($users as $user)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->username }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->store_id }}</td>
                                    <td class="px-4 py-2">
                                        <x-primary-button tag="a" href="{{ route('user.edit', $user->id) }}" class="text-sm bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded-lg transition duration-300">
                                            Edit
                                        </x-primary-button>
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                            x-on:click="$dispatch('set-action', '{{ route('user.destroy', $user->id) }}')"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-lg ml-2 transition duration-300">
                                            {{ __('Hapus Data') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </x-table>
                    </div>

                    <x-modal name="confirm-user-deletion" focusable maxWidth="xl">
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
                                <x-secondary-button x-on:click="$dispatch('close')" class="px-6 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3 px-6 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg">
                                    {{ __('Hapus!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
