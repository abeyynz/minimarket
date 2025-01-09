<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 5px;
        }

        th {
            border-bottom: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Mini Market Pak Jayusman</h2>
        <p><strong>Kode Transaksi:</strong> {{ $transaction->code }}</p>
        <p><strong>Tanggal:</strong> {{ $transaction->date }}</p>
        <p><strong>Kasir:</strong> {{ $transaction->user->name }}</p>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
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

        <p class="text-right bold">Total: Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
        <p class="text-center">Terima kasih atas kunjungan Anda!</p>
    </div>
</body>
</html>
