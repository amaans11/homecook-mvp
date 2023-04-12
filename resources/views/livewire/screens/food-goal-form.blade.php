<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 2 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-3 flex-shrink-0">What are your food-related goals? </h1>
        <p class="text--primary text-sm mb-8 font-medium flex-shrink-0">(choose up to 3)</p>

        <div class="grid grid-cols-2 gap-3 overflow-y-auto">
            @foreach($options as $value => $option)
                <x-checkbox-card
                    name="goals"
                    type="checkbox"
                    value="{{ $value }}"
                    checked="{{ in_array($value, $goals) ? 'true' : 'false' }}"
                    label-class="{{ $value === 'other' ? 'col-span-2' : '' }}"
                    class="rounded-lg flex flex-col justify-center items-center text-center py-2 px-2"
                >
                    @if($option['icon'])
                        <img src="{{ $option['icon'] }}" style="height: 57px" />
                    @endif
                    {{ $option['text'] }}
                </x-checkbox-card>
            @endforeach
        </div>
        @error('goals') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    @if(count($goals))
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('dietForm') }}"
                class="btn--primary-outlined w-full"
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
        
        <x-analytics-tracker page="food-goal-form" />
</form>
