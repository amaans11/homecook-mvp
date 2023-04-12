<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 7 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-8 flex-shrink-0">What’s your budget for ingredients?</h1>

        <div class="grid grid-cols-1 gap-3 overflow-y-auto">
            @foreach($options as $value => $option)
                <x-checkbox-card
                    name="budget"
                    type="radio"
                    value="{{ $value }}"
                    checked="{{ $value === $budget ? 'true' : 'false' }}"
                    class="rounded-lg flex justify-between items-center py-4 px-4 font-bold"
                >
                    <div class="mr-4">
                        <p class="text-xl text--primary">{{ $option['title'] }}</p>
                        <p class="text-sm font-normal">{{ $option['description'] }}</p>
                    </div>
                    <div class="flex flex-col text-right flex-shrink-0 text-gray-700">
                        <p class="text-lg leading-4">+ ${{ $option['price'] }}</p>
                        <span class="text-xs">/serving</span>
                    </div>
                </x-checkbox-card>
            @endforeach
        </div>
        @error('budget') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    @if($budget)
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('mealsForm') }}"
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

    <x-analytics-tracker page="chef-form" />
</form>
