<x-guest-layout>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-100 rounded-md mb-4">
        <!-- Logo and Heading -->
        <div class="text-center mb-6 w-3/4 max-w-lg">
            <img src="/img/logo-removebg-preview.png" width="1" height="1" class="mx-auto" /> 
            <h4 class="text-3xl font-bold text-gray-800">WalletWise</h4>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" 
            class="rounded-lg p-8 w-11/12 max-w-md">
            @csrf

            <h2 class="text-2xl font-semibold text-center mb-6">Register Yourself</h2>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block w-full p-2 border rounded-md" 
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full p-2 border rounded-md" 
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full p-2 border rounded-md" 
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block w-full p-2 border rounded-md" 
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block w-full p-2 border rounded-md" 
                    type="number" name="age" min="15" :value="old('age')" required />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Contact -->
            <div class="mt-4">
                <x-input-label for="contact" :value="__('Contact')" />
                <x-text-input id="contact" class="block w-full p-2 border rounded-md" 
                    type="text" name="contact" :value="old('contact')" required />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

            <!-- Plan Type -->
            <div class="mt-4">
                <x-input-label for="plan_type" :value="__('Plan Type')" />
                <select id="plan_type" name="plan_type" class="block w-full p-2 border rounded-md">
                    <option value="regular" {{ old('plan_type') == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="premium" {{ old('plan_type') == 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
                <x-input-error :messages="$errors->get('plan_type')" class="mt-2" />
            </div>

            <!-- Limit -->
            <div class="mt-4">
                <x-input-label for="limit" :value="__('Limit')" />
                <x-text-input id="limit" class="block w-full p-2 border rounded-md" 
                    type="number" name="limit" step="0.01" min="0" :value="old('limit')" required />
                <x-input-error :messages="$errors->get('limit')" class="mt-2" />
            </div>

            <!-- Profile Picture -->
            <div class="mt-4">
                <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                <input id="profile_picture" type="file" name="profile_picture" 
                    class="block w-full p-2 border rounded-md" accept="image/*">
                <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
