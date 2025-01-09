<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white dark:bg-gray-700 text-blue-400 dark:text-gray-300 py-4 px-6">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Cabang Cianjur') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6 px-4">
        <form method="GET" action="{{ route('transaction') }}" class="mb-4">
            <div class="flex">
                <input
                    type="text"
                    name="search_product"
                    value="{{ $search }}"
                    placeholder="Cari produk..."
                    class="w-full px-4 py-2 border rounded-l-md"
                />
                <button
                    type="submit"
                    class="px-4 bg-blue-600 text-white rounded-r-md hover:bg-blue-700"
                >
                    Cari
                </button>
            </div>
        </form>
        <form action="{{ route('transaction.store') }}" method="POST" id="transaction-form">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="col-span-2 md:col-span-2 lg:col-span-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($products as $product)
                            <div class="border rounded-lg shadow-md p-4 bg-blue-100 dark:bg-gray-700">
                                <div class="text-center mb-4">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-52 object-cover rounded-lg">
                                </div>
                                <div class="text-center text-gray-700 dark:text-gray-100">
                                    <h3 class="font-bold text-xl">{{ $product->name }}</h3>
                                    <p class="text-sm">Stok: {{ $product->stock }}</p>
                                    <p class="text-lg font-semibold">Rp {{ number_format($product->price, 2) }}</p>
                                    <div class="mt-4 flex justify-center items-center">
                                        <input
                                            type="checkbox"
                                            name="product_ids[]"
                                            value="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            class="mr-2"
                                        />
                                        <input
                                            type="number"
                                            name="qty[{{ $product->id }}]"
                                            min="1"
                                            max="{{ $product->stock }}"
                                            value="1"
                                            class="w-16 bg-slate-800 text-center border rounded"
                                            data-price="{{ $product->price }}"
                                        />
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Pesan jika produk tidak ditemukan -->
                            <div class="col-span-3 text-center">
                                <p class="text-lg text-gray-500 dark:text-gray-400">
                                    Tidak ada produk yang ditemukan.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-span-1 border rounded-lg shadow-md p-6 bg-white dark:bg-gray-700">
                    <h2 class="text-xl text-blue-600 dark:text-gray-100 flex flex-col items-center justify-center font-bold mb-4">Transaksi</h2>

                    <div id="selected-products" class="mb-4">
                        <h3 class=" text-blue-600 dark:text-gray-100 font-bold mb-2">Produk yang Dipilih : </h3>
                        <ul id="product-list" class="list-none p-0"></ul>
                    </div>

                    <div class="text-center">
                        <x-danger-button
                            x-data
                            x-on:click="$dispatch('open-modal', 'success-transaction'); action='{{ route('transaction.store') }}'"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            {{ __('Pesan') }}
                        </x-danger-button>
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
    <x-modal name="success-transaction" focusable maxWidth="xl" x-data="{ action: '' }">
        <form method="post" x-bind:action="action" class="p-6">
            @csrf
            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Transaksi berhasil') }}
            </h1>
        </form>
    </x-modal>
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
                            <span class="text-gray-100 font-bold">${truncatedName}</span>
                            <span class="text-gray-100 text-right"> ${qty} x Rp ${formattedPrice}</span>
                        `;
                        productList.appendChild(listItem);
                    }
                });
            }
        });
    </script>
</x-app-layout>
