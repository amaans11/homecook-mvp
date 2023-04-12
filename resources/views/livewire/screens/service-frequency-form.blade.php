<form wire:submit.prevent="submit" class="flex flex-col justify-between py-4 overflow-hidden h-body">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 8 * (100 / 8) }}" class="flex-shrink-0 mt-3 mb-6" />

        <h1 class="flex-shrink-0 mb-10 text-4xl font-bold">If you liked it, how often might you use this service?</h1>

        <div class="grid grid-cols-2 gap-3 overflow-y-auto">
            @foreach ($options as $value => $text)
                <x-checkbox-card name="serviceFrequency" type="radio" value="{{ $value }}"
                    checked="{{ $value === $serviceFrequency ? 'true' : 'false' }}"
                    class="flex items-center justify-center px-2 py-4 font-bold rounded-lg">
                    {{ $text }}
                </x-checkbox-card>
            @endforeach
        </div>
        @error('peopleChefServe') <p class="mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>

    @if ($serviceFrequency)
        <div class="grid w-full max-w-md grid-cols-2 gap-2 pt-4 mx-auto mt-4 border-t border-gray-200">
             <x-button
             as="a"
             href="{{ route('chefForm') }}"
             class="w-full btn--primary-outlined"
             wire:loading.attr="disabled"
             >
             Back
             </x-button>
            <x-button type="submit" class="w-full btn--primary" wire:loading.attr="disabled">
                Continue
            </x-button>
        </div>
    @endif

    <x-analytics-tracker page="service-frequency" />
</form>
