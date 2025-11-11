<x-filament-panels::page>
    <div class="flex items-center justify-center min-h-[400px]">
        <div class="text-center">
            <div class="mb-6">
                <x-filament::icon 
                    icon="heroicon-o-lock-closed" 
                    class="w-16 h-16 mx-auto text-primary-500"
                />
            </div>
            <h2 class="text-2xl font-bold mb-2">Reset Your Password</h2>
            <p class="text-gray-500 mb-6">Click the button below to change your password</p>
            
            <x-filament::button
                wire:click="mountAction('resetPassword')"
                icon="heroicon-o-lock-closed"
                color="primary"
                size="lg"
            >
                Reset Password
            </x-filament::button>
        </div>
    </div>

    <x-filament-actions::modals />
</x-filament-panels::page>
