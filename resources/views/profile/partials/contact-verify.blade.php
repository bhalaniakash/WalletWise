<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Verify contact number') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('You will get reminder and other information only if you verify it here.') }}
        </p>
    </header>

    <!-- Update Plan & Pay Button -->
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-plan-upgrade')">
        {{ __('Send otp on registerd number') }}
    </x-primary-button>

    <!-- Modal for Confirming Plan Upgrade -->
    <x-modal name="confirm-plan-upgrade" focusable>
        <form method="post" class="p-6">
            @csrf
            <!-- OTP Input -->
            <div>
                <label for="otp" class="block font-medium text-sm text-gray-700">
                    {{ __('Enter OTP') }}
                </label>
                <input type="text" id="otp" name="otp"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required maxlength="6" pattern="[0-9]{6}" placeholder="Enter 6-digit OTP">
            </div>

            <div class="mt-6 flex justify-end">
                <!-- Cancel Button -->
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <!-- Proceed to Payment Button -->
                <x-primary-button class="ms-3">
                    {{ __('Verify contact number') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>