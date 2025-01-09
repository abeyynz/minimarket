<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-blue-400 dark:text-gray-300 py-4 px-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail {{ $transaction->code }}
            </h2>
            <a href="{{ route('transaction.print', $transaction->id) }}"
                class="bg-blue-400 dark:bg-blue-900 hover:bg-blue-300 dark:hover:bg-blue-700 text-white dark:text-gray-100 py-1 px-4 rounded">
                print
            </a>
        </div>
    </x-slot>
    <div class="max-w-md mx-auto mt-8 p-4 bg-white border border-gray-200 rounded-lg shadow-md">
        <h2 class="text-center text-lg font-bold mb-4">Mini Market Pak Jayusman</h2>
        <div class="text-sm mb-4">
            <p><strong>Kode Transaksi:</strong> {{ $transaction->code }}</p>
            <p><strong>Tanggal:</strong> {{ $transaction->date }}</p>
            <p><strong>Kasir:</strong> {{ $transaction->user->name }}</p>
        </div>
        <table class="w-full text-sm mb-4">
            <thead>
                <tr>
                    <th class="text-left">Produk</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction_details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td class="text-right">{{ $detail->qty }}</td>
                        <td class="text-right">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                        <td class="text-right">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total -->
        <div class="border-t border-gray-300 pt-2 text-right">
            <p class="font-bold">Total: Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs mt-4">Terima kasih atas kunjungan Anda!</p>

    </div>
</x-app-layout>
