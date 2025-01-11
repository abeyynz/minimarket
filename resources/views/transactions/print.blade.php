<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        .blue-column {
            background-color: #60a5fa; 
            color: black;
        }

        h2 {
            text-align: center;
        }

        .no-data-message {
            text-align: center;
            font-size: 18px;
            color: red;
            font-weight: bold;
        }
        .store-name {
            text-align: center;
            font-size: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi - JayuSMart</h2>

    <div class="store-name">
        <p><strong>{{ $storeName }}</strong></p>
    </div>

    @if (isset($no_data_message))
        <p class="no-data-message">{{ $no_data_message }}</p>
    @else
        <table>
            <thead>
                <tr>
                    <th class="blue-column">No</th>
                    <th class="blue-column">Kode Transaksi</th>
                    <th class="blue-column">Tanggal</th>
                    <th class="blue-column">Total Bayar</th>
                    <th class="blue-column">Kasir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->code }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}</td>
                        <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                        <td>{{ $transaction->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
