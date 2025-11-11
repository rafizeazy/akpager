<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Profile Information</h2>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">Name</label>
                    <p class="text-sm text-gray-900">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <p class="text-sm text-gray-900">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
