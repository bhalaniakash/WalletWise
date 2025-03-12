<x-guest-layout>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-100 rounded-md">
        <!-- Logo and Heading -->
        <div class="text-center mb-6 w-3/4 max-w-lg">
            <img src="/img/logo-removebg-preview.png" width="150" height="150" class="mx-auto" />
            <h4 class="text-3xl font-bold text-gray-800">WalletWise</h4>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class=" rounded-lg p-8 w-11/12 max-w-md" style="width: 90%; margin-bottom: 10px;">
            @csrf

            <h2 class="text-2xl font-semibold text-center mb-6">Log in</h2>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full p-2 border rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full p-2 border rounded-md" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Register here') }}
                </a>
                <!-- <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a> -->
                <x-primary-button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
