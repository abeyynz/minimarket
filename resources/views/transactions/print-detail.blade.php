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

        .product {
            margin-bottom: 10px;
        }

        .product-name {
            font-weight: bold;
        }

        .product-detail {
            display: flex;
            justify-content: space-between;
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

        <div>
            @foreach ($transaction_details as $detail)
                <div class="product">
                    <!-- Nama produk -->
                    <div class="product-name">{{ $detail->product->name }}</div>

                    <!-- Detail jumlah dan harga -->
                    <div class="product-detail">
                        <span>{{ $detail->qty }} x Rp {{ number_format($detail->price, 0, ',', '.') }}</span>
                        <span>Rp {{ number_format($detail->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-right bold">Total: Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
        <p class="text-center">Terima kasih atas kunjungan Anda!</p>
    </div>
</body>
</html>
