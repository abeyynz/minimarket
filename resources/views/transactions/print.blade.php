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
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Riwayat Transaksi - Mini Market Pak Jayusman</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->code }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td>{{ $transaction->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
