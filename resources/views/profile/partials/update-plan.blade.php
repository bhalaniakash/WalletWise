<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Upgrade Your Plan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upgrade to Premium to unlock advanced features and get the best experience. Click below to proceed with payment.') }}
        </p>
    </header>

    <!-- Update Plan & Pay Button -->
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-plan-upgrade')"
    >
        {{ __('Update Plan & Pay') }}
    </x-primary-button>

    <!-- Modal for Confirming Plan Upgrade -->
    <x-modal name="confirm-plan-upgrade" focusable>
        <form method="post"  class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Confirm Plan Upgrade') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('You are about to upgrade to the Premium Plan. Click "Proceed to Payment" to continue.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <!-- Cancel Button -->
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <!-- Proceed to Payment Button -->
                <x-primary-button class="ms-3">
                    {{ __('Proceed to Payment') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>

