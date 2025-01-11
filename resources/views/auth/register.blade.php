<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-white">
        <div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row w-full max-w-6xl">
           
            <!--Login Section-->
            <div class="md:w-1/2 p-8 flex flex-col items-center justify-center bg-cover bg-center rounded-t-lg md:rounded-l-lg md:rounded-t-none relative">
                <video autoplay muted loop class="relative inset-0 w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                    <source src="https://cdn.dribbble.com/userupload/16791399/file/original-4273fdd434efc40592e1e1347b5197c3.mp4">           
                </video>
                <div class="relative z-10 text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">Hello friends</h1>
                    <p class="text-white mb-8">if you already have an account login here and have fun.</p>
                    <a href="{{ route('login') }}" class="px-6 py-2 border border-white text-white rounded-full">Login</a>
                </div>
                <div class="absolute inset-0 bg-gray-800 opacity-40 rounded-t-lg md:rounded-l-lg md:rounded-t-none"></div>
            </div>
            <div class="md:w-1/2 p-8 flex flex-col justify-center items-center text-center">
                <h2 class="text-3xl font-bold mb-2">Register</h2>
                <form method="POST" action="{{ route('register') }}" class="space-y-4 w-full">
                    @csrf

                    <!-- Name -->
                    <x-input-label for="name" :value="__('Name')" />
                    <div class="flex items-center justify-center text-center">
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <x-input-label for="email" :value="__('Email')"/>
                    <div class="flex items-center justify-center text-center">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="flex items-center justify-center text-center">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="flex items-center justify-center text-center">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-center mt-6" style="margin-top:10%">
                        <x-input-label for="register" :value="__('')" />
                        <button type="submit" class=" bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 w-4/5 ">
                            {{ __('Register') }}
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-blue-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-guest-layout>
