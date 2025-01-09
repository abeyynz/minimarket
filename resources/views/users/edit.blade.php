<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center min-h-screen">
        <div class="max-w-3xl w-full mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="text-center">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">{{ __('Edit User') }}</h3>
            </div>

            <form method="post" action="{{ route('user.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Nama" class="text-gray-900 dark:text-gray-100" />
                    <x-text-input id="name" type="text" name="name" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" value="{{ old('name', $user->name) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="username" value="Username" class="text-gray-900 dark:text-gray-100" />
                    <x-text-input id="username" type="text" name="username" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" value="{{ old('username', $user->username) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" class="text-gray-900 dark:text-gray-100" />
                    <x-text-input id="email" type="email" name="email" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" value="{{ old('email', $user->email) }}" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="flex justify-center space-x-4 mt-6">
                    <x-secondary-button tag="a" href="{{ route('user') }}" class="px-6 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded-lg transition duration-300">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button name="save" class="px-6 py-2 text-white bg-green-500 hover:bg-green-600 rounded-lg transition duration-300">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
