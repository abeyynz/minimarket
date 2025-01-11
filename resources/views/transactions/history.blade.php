<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-blue-400 dark:text-gray-300 py-4 px-6">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __($storeName) }}
            </h2>
            <a href="{{ route('history.print', [
                'store_id' => request('store_id'),
                'start_date' => request('start_date'),
                'end_date' => request('end_date')
            ]) }}"
                class="bg-green-600 hover:bg-green-400 text-white dark:text-gray-100 py-1 px-4 rounded">
                Cetak Riwayat Transaksi
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4 pb-10">
        <form method="GET" action="{{ route('history') }}" class="mb-4 flex items-center space-x-4 justify-end">
            @if (Auth::user()->hasRole('owner'))
                <div>
                    <label for="store_id" class="block text-sm font-medium text-white">Pilih Cabang</label>
                    <select name="store_id" id="store_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="all">Semua Cabang</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" {{ request('store_id') == $store->id ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div>
                <label for="start_date" class="block text-sm font-medium text-white">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-white">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="self-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Filter</button>
            </div>
        </form>
        <table class="table-auto w-full bg-white dark:bg-gray-400 border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-blue-400 dark:bg-gray-700 text-white ">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-center">No</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Kode Transaksi</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Total Bayar</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Kasir</th>
                    @hasrole('cashier|supervisor')
                    <th class="border border-gray-300 px-4 py-3 text-center">Aksi</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr class="hover:bg-gray-300">
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->code }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->date }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->total }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $transaction->user->name }}</td>
                        @hasrole('cashier|supervisor')
                        <td class="border border-gray-300 px-4 py-3 text-center">
                                <a href="{{ route('transaction.detail', $transaction->id) }}" class="bg-blue-400 dark:bg-blue-900 hover:bg-blue-300 dark:hover:bg-blue-700 text-white dark:text-gray-100 py-2 px-4 rounded">
                                    Lihat Detail
                                </a>
                            </td>
                        @endhasrole
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-3 text-center ">
                            Data tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
