<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-blue-400 dark:text-gray-300 py-4 px-6">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Cabang ' . $storeName) }}
            </h2>

            <a href="{{ route('history.print') }}" class="bg-green-600 hover:bg-green-400 text-white dark:text-gray-100 py-1 px-4 rounded">
                Cetak Riwayat Transaksi
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4">
        <table class="table-auto w-full bg-white dark:bg-gray-400 border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-blue-400 dark:bg-gray-700 text-white ">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-center">No</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Kode Transaksi</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Total Bayar</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Kasir</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="hover:bg-gray-300">
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->code }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->date }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->total }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->user->name }}</td>

                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('transaction.detail', $transaction->id) }}" class="bg-blue-400 dark:bg-blue-900 hover:bg-blue-300 dark:hover:bg-blue-700 text-white dark:text-gray-100 py-2 px-4 rounded">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
