<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Security Settings</h3>
                <p class="text-sm text-gray-500 mt-1">Manage your account password and security preferences.</p>
            </div>
            <div>
                <x-filament::button
                    wire:click="mountAction('resetPassword')"
                    icon="heroicon-o-lock-closed"
                    color="primary"
                >
                    Reset Password
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>
