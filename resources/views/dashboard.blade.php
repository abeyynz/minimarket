<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-500 dark:text-gray-100">
                    {{-- <h1>{{ __('Report ').$store->name }}</h1> --}}
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in hover:scale-105 transition transform duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Transaksi</h3>
                    <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                        {{ $transactionCount }}
                    </div>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Jumlah transaksi yang telah diproses</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in hover:scale-105 transition transform duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Gudang</h3>
                    <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                        {{ $totalStock }}
                    </div>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Jumlah barang yang tersedia di gudang</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Barang Terlaris</h3>
                    <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                        {{ $bestProductName }}
                    </div>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Barang yang paling banyak terjual</p>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 fade-in">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Pemasukan</h3>
                    <div class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-200">
                        Rp {{ number_format($totalIncome, 0, ',', '.') }}
                    </div>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Total pemasukan bulan ini</p>
                </div>
            </div>

            <div class="mt-12 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-6 fade-in">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Grafik Pemasukan</h3>
                <canvas id="incomeChart" class="mt-6"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const incomeData = @json($incomeData);

        const ctx = document.getElementById('incomeChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{
                    label: 'Pemasukan (Rp)',
                    data: incomeData,
                    backgroundColor: ['rgba(75, 192, 192, 0.6)'],
                    borderColor: ['rgba(75, 192, 192, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.querySelectorAll('.fade-in').forEach(el => {
            el.style.animation = 'fadeIn 0.8s ease-out';
            el.style.opacity = '1';
        });
    </script>

</x-app-layout>
