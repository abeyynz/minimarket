<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center text-blue-400 py-4 px-6">
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
                <div class="col-span-1 border rounded-lg shadow-md p-6 bg-white dark:bg-gray-700">
                    <h2 class="text-xl text-blue-600 font-bold mb-4">Transaksi</h2>

                    <div id="selected-products" class="mb-4">
                        <h3 class="font-bold mb-2">Produk yang Dipilih:</h3>
                        <ul id="product-list" class="list-none p-0"></ul>
                    </div>

                    <div class="text-center">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        >
                            Proses Pesanan
                        </button>
                    </div>
                </div>


                <div class="col-span-3 mt-4">
                    <div class="flex justify-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[name="product_ids[]"]');
            const productList = document.getElementById('product-list');

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', function () {
                    updateSelectedProducts();
                });
            });

            function updateSelectedProducts() {
                productList.innerHTML = '';
                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        const productId = checkbox.value;
                        const productName = checkbox.getAttribute('data-name');
                        const productPrice = checkbox.getAttribute('data-price');
                        const qtyInput = document.querySelector(`input[name="qty[${productId}]"]`);
                        const qty = qtyInput ? qtyInput.value : 1;

                        const nameWords = productName.split(" ").slice(0, 10).join(" ");
                        const truncatedName = (productName.split(" ").length > 10) ? nameWords + '...' : nameWords;

                        const formattedPrice = parseFloat(productPrice).toLocaleString('id-ID');

                        const listItem = document.createElement('li');
                        listItem.classList.add('mb-2', 'flex', 'justify-between', 'items-center');
                        listItem.innerHTML = `
                            <span class="font-bold">${truncatedName}</span>
                            <span class="text-right"> ${qty} x Rp ${formattedPrice}</span>
                        `;
                        productList.appendChild(listItem);
                    }
                });
            }
        });
    </script>
</x-app-layout>
