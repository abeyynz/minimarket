<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('store.update', $store->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                            <div class="space-y-6">
                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="name" value="Nama" />
                                    <x-text-input id="name" type="text" name="name" class="mt-1 block w-full rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500" value="{{ old('name', $store->name) }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="location" value="Lokasi" />
                                    <x-text-input id="location" type="text" name="location" class="mt-1 block w-full rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500" value="{{ old('location', $store->location) }}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                                </div>

                                <div class="max-w-xl mx-auto">
                                    <x-input-label for="image" value="Gambar Toko" />
                                    <x-text-input id="image" type="file" name="image" class="mt-1 block w-full rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:focus:ring-green-500 dark:focus:border-green-500" accept="image/*" onchange="previewImage(event)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <div id="image-preview-container" class="w-64 h-64 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-300 dark:border-gray-600">
                                    <img id="image-preview" src="{{ old('image', $store->image_url) }}" alt="Image Preview" class="max-w-full max-h-full object-contain hidden" />
                                    <span id="image-placeholder" class="text-gray-500 dark:text-gray-300">Preview Gambar</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center gap-4 mt-6">
                            <x-secondary-button tag="a" href="{{ route('store') }}" class="px-6 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition duration-300">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                            <x-primary-button name="save" class="px-6 py-2 rounded-lg bg-green-500 hover:bg-green-700 text-white transition duration-300">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const placeholder = document.getElementById('image-placeholder');

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
