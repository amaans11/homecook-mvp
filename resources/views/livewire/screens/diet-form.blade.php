<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 1 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-3 flex-shrink-0">What’s your preference?</h1>
        <p class="text--primary text-sm mb-8 font-medium flex-shrink-0">(choose any that apply)</p>

        <div class="grid grid-cols-2 gap-3 overflow-y-auto">
            @foreach($options as $value => $text)
                <x-checkbox-card
                    name="diets"
                    type="checkbox"
                    value="{{ $value }}"
                    checked="{{ in_array($value, $diets) ? 'true' : 'false' }}"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
                >
                    {{ $text }}
                </x-checkbox-card>
            @endforeach
        </div>
        @error('diets') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    @if(count($diets))
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                type="button"
                class="btn--primary-outlined w-full"
                wire:click="goBack"
                wire:loading.attr="disabled"
            >
                Back
            </x-button>
            <x-button
                type="submit"
                class="btn--primary w-full"
                wire:loading.attr="disabled"
            >
                Continue
            </x-button>
        </div>
    @endif

    <x-analytics-tracker page="diet-form" />
</form>
