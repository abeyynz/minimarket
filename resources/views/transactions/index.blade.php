<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white text-blue-400 dark:text-gray-100 py-4 px-6">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Cabang Cianjur') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4">
    <div class="grid grid-cols-3 gap-6">
        <!-- Pilih Produk -->
        <div class="col-span-2 border-8 rounded-lg shadow-md border-blue-300 p-10 bg-blue-100">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl text-blue-600 font-bold dark:text-gray-100">Pilih Produk</h2>
                <div class="relative flex items-center">
                    <input
                        type="text"
                        class="w-full border border-blue-400 bg-white rounded p-2 pl-10"
                        placeholder="Cari produk..."
                    />
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="absolute left-3 w-5 h-5 text-gray-500"
                        viewBox="0 0 50 50"
                    >
                        <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path>
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                <!-- Produk 1 -->
                <div class="border rounded-lg shadow-md p-3 bg-blue-300">
                    <img src="https://d3bbrrd0qs69m4.cloudfront.net/images/product/apotek_online_k24klik_2022122302235823085_UHT-180-ML---JEJU-CHOCOLATE.jpg" alt="SunCo" class="w-full h-48 object-cover mb-4" />
                    <div class="product-details text-gray-700 dark:text-gray-100 flex flex-col items-center justify-center">
                        <h2 class="card-title">Indomilk Choco Latte</h2>
                        <h4 class="card-price">Rp 9000</h4>
                        <div class="flex items-center">
                            <div class="input-wrapper flex-1">
                                <input type="number" id="quantity-SKT001" class="w-full p-2 border border-gray-300 rounded" placeholder="Jumlah :" min="0">
                            </div>
                            <div class="ml-2">
                                <input type="checkbox" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Produk 2 -->
                <div class="border rounded-lg shadow-md p-3 bg-blue-300">
                    <img src="https://solvent-production.s3.amazonaws.com/media/images/products/2021/10/DSC_0212_dP8qhmN.JPG" alt="Bimoli" class="w-full h-48 object-cover mb-4" />
                    <div class="product-details text-gray-700 dark:text-gray-100 flex flex-col items-center justify-center">
                        <h2 class="card-title">Monde</h2>
                        <h4 class="card-price">Rp 6000</h4>
                        <div class="flex items-center">
                            <div class="input-wrapper flex-1">
                                <input type="number" id="quantity-MR-001" class="w-full p-2 border border-gray-300 rounded" placeholder="Jumlah :" min="0">
                            </div>
                            <div class="ml-2">
                                <input type="checkbox" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Produk 3 -->
                <div class="border rounded-lg shadow-md p-3 bg-blue-300">
                    <img src="https://c.alfagift.id/product/1/A7708190002167_A7708190002167_20230919103313565_base.jpg" alt="Sania" class="w-full h-48 object-cover mb-4" />
                    <div class="product-details text-gray-700 dark:text-gray-100 flex flex-col items-center justify-center">
                        <h2 class="card-title">Jetz</h2>
                        <h4 class="card-price">Rp 7000</h4>
                        <div class="flex items-center">
                            <div class="input-wrapper flex-1 ">
                                <input type="number" id="quantity-MR-002" class="w-full p-2 border border-gray-300 rounded" placeholder="Jumlah :" min="0">
                            </div>
                            <div class="ml-2">
                                <input type="checkbox" />
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        <!-- Produk yang Dipilih -->
        <div class="col-span-1 border-8 rounded-lg shadow-md border-blue-300 p-10 bg-white">
            <h1 class="text-2xl text-blue-600 dark:text-gray-100 flex flex-col items-center justify-center font-bold mb-4">Transaksi</h1>
                <div class="max-w-xl">
                    <label for="name" class="block text-blue-400 dark:text-gray-100 font-bold">Produk yang dipilih : </label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="max-w-xl">
                    <label for="price" class="block text-blue-400 dark:text-gray-100 font-bold">Total Bayar : </label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="max-w-xl">
                    <label for="price" class="block text-blue-400 dark:text-gray-100 font-bold">Uang Tunai : </label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="max-w-xl">
                    <label for="price" class="block text-blue-400 dark:text-gray-100 font-bold">Uang Kembali : </label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded">
                </div>
            <button
                class="bg-blue-600 hover:bg-blue-400 text-white dark:text-gray-100 py-2 px-4 rounded mt-4"
            >
                Bayar
            </button>
        </div>
    </div>
</div>

    
</x-app-layout>
