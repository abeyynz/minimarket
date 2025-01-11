<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-white">
        <!-- Login Section -->
        <div class="p-8 md:w-1/2">
            <h2 class="text-3xl font-bold mb-6 flex items-center justify-center text-center">Login</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="flex items-center justify-center text-center">
                    <x-input-label for="email" :value="__('Email')" />
                </div>
                <div class="mb-4 flex items-center justify-center text-center">
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="flex items-center justify-center text-center">
                    <x-input-label for="password" :value="__('Password')" />
                </div>
                <div class="mb-4 flex items-center justify-center text-center">
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full " 
                        type="password" 
                        name="password" 
                        required autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center ml-12">
                        <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-blue-500 mr-14" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <div class="flex items-center justify-center text-center">
                    <button type="submit" class=" bg-blue-500 text-white p-3 rounded-lg font-semibold hover:bg-blue-600 w-4/5 ">
                        {{ __('Log in') }}
                    </button>
                </div>
                
            </form>
            
            <div class="flex justify-center mt-4 space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-google"></i></a>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
      
        <!-- Register Section -->
        <div class="md:w-1/2 p-8 flex flex-col items-center justify-center bg-cover bg-center rounded-t-lg md:rounded-l-lg md:rounded-t-none relative">
            <video autoplay muted loop class="relative inset-0 w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                <source src="https://cdn.dribbble.com/userupload/15193747/file/original-666103041e0df49f04e41ba690a67abc.mp4">
            </video>
            <div class="relative z-10 text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Start Your Journey</h1>
                <p class="text-white mb-8">if you don't have any account yet. join us and start your journey.</p>
                <a href="{{ route('register') }}" class="px-6 py-2 border border-white text-white rounded-full">Register</a>
            </div>
            <div class="absolute inset-0 bg-gray-800 opacity-40 rounded-t-lg md:rounded-l-lg md:rounded-t-none"></div>
        </div>
    </div>
</x-guest-layout>
