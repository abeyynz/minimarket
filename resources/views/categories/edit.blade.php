<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('category') }}" class="text-blue-600 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-blue-400 dark:text-gray-300 leading-tight">
                {{ __('Kategori') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex-grow container mx-auto mt-6 px-4">
        <form method="post" action="{{ route('category.update', $category->id) }}" class="space-y-6 max-w-md mx-auto">
            @csrf
            @method('PATCH')
            <div class="max-w-xl">
                <x-input-label for="name" value="Nama Kategori" />
                <x-text-input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name', $category->name) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="max-w-xl">
                <x-input-label for="code" value="Kode Kategori" />
                <x-text-input id="code" type="text" name="code" class="mt-1 block w-full" value="{{ old('code', $category->code) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('code')" />
            </div>
            <x-secondary-button tag="a" href="{{ route('category') }}">Batal</x-secondary-button>
            <x-primary-button name="save">Perbarui</x-primary-button>
        </form>
    </div>
</x-app-layout>
