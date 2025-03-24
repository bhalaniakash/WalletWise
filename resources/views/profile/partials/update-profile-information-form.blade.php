<html>

<head>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7fafc;
            color: #000;
        }

        button {
            background-color: #000;
            border-color: #000;
        }
    </style>
</head>

<body>
    <section>
        <header>
            <h2 class="text-lg font-medium  ">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-1 text-sm ">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <!-- Name Field -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email Field -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Age Field -->
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" required />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>

            <!-- Contact Field -->
            <div>
                <x-input-label for="contact" :value="__('Contact Number')" />
                <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full" :value="old('contact', $user->contact)" />
                <x-input-error class="mt-2" :messages="$errors->get('contact')" />
            </div>

            {{-- this was created to update the membership status which is for future use --}}

            <!-- Plan Type Field -->
            {{-- <div>
                <x-input-label for="plan_type" :value="__('Plan Type')" />
                <select id="plan_type" name="plan_type" class="mt-1 block w-full">
                    <option value="regular" {{ old('plan_type', $user->plan_type) == 'regular' ? 'selected' : ''
                        }}>Regular</option>
                    <option value="premium" {{ old('plan_type', $user->plan_type) == 'premium' ? 'selected' : ''
                        }}>Premium</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('plan_type')" />
            </div> --}}

            <!-- Budget Limit Field -->
            <!-- <div>
                <x-input-label for="limit" :value="__('Budget Limit')" />
                <x-text-input id="limit" name="limit" type="number" class="mt-1 block w-full" :value="old('limit', $user->limit)" required />
                <x-input-error class="mt-2" :messages="$errors->get('limit')" />
            </div> -->

            <!-- Profile Picture Field -->
            <div>
                <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                <input hidden id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full"
                    accept="image/*">
                <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />

                @if ($user->profile_picture)
                    <div class="mt-2">
                        <label for="profile_picture" class="mt-2 block">
                            <img id="profilePreview" src="{{ asset('storage/' . $user->profile_picture) }}"
                                alt="Profile Picture" class="w-20 h-20 rounded-full">
                        </label>
                    </div>
                @endif
            </div>
            <script>
                document.getElementById('profile_picture').addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById('profilePreview').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Saved.') }}
                    </p>
                @endif
            </div>

        </form>
    </section>
</body>

</html>