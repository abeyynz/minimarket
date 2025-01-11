<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Stok - JayuSMart</title>
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
    <h2>Log Stok - JayuSMart</h2>

    <div class="store-name">
        <p><strong>{{ $storeName }}</strong></p>
    </div>

    @if ($stockLogs->isEmpty())
        <p class="no-data-message">Tidak ada data untuk dicetak</p>
    @else
        <table>
            <thead>
                <tr>
                    <th class="blue-column">No</th>
                    <th class="blue-column">Nama Produk</th>
                    <th class="blue-column">Jenis Perubahan</th>
                    <th class="blue-column">Jumlah</th>
                    <th class="blue-column">Tanggal</th>
                    <th class="blue-column">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockLogs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->product->name }}</td>
                        <td>{{ ucfirst($log->change_type) }}</td>
                        <td>{{ $log->quantity }}</td>
                        <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $log->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
