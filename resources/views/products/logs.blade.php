<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-blue-400 dark:text-gray-300 py-1 px-6">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Logs Stock') }}
            </h2>
            <a href="{{ route('logs.print', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                class="bg-green-600 hover:bg-green-400 text-white dark:text-gray-100 py-1 px-4 rounded">
                Cetak Log
             </a>

        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4 pb-10">
        <form method="GET" action="{{ route('logs') }}" class="mb-4 flex items-center space-x-4 justify-end">
            @if (Auth::user()->hasRole('owner'))
                <div>
                    <label for="store_id" class="block text-sm font-medium text-white">Pilih Cabang</label>
                    <select name="store_id" id="store_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="all" {{ request('store_id') == 'all' ? 'selected' : '' }}>Semua Cabang</option>
                        @foreach ($data['stores'] as $store)
                            <option value="{{ $store->id }}" {{ request('store_id') == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
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
            <thead class="bg-blue-400 dark:bg-gray-700 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-center">No</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Nama Produk</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Jenis Perubahan</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockLogs as $log)
                    <tr class="hover:bg-gray-200">
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">
                            {{ $log->product->name }} <!-- Menampilkan nama produk terkait -->
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ ucfirst($log->change_type) }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $log->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $log->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination untuk memudahkan navigasi log -->
        {{ $stockLogs->links() }}
    </div>
</x-app-layout>
