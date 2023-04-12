<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 6 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-3 flex-shrink-0">How many servings per Chef’s visit?</h1>
        <p class="text--primary text-sm mb-8 font-medium flex-shrink-0">(ingredient cost not included)</p>

        <div class="overflow-y-auto">
            <div class="grid grid-cols-1 gap-3">
                @foreach($options as $value => $option)
                    <x-checkbox-card
                        name="meals"
                        type="radio"
                        value="{{ $value }}"
                        checked="{{ $value === $meals ? 'true' : 'false' }}"
                        class="rounded-lg flex justify-between items-center py-4 px-4"
                    >
                        <p class="text-lg font-bold text--primary mr-4">{{ $option['title'] }}</p>
                        <p class="font-bold">${{ $option['price'] }}<span class="text-xs font-medium"> / serving</span></p>
                    </x-checkbox-card>
                @endforeach
            </div>
            @error('meals') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
        <p class="flex items-center text-gray-500 mt-4">
            <i class="fas fa-info-circle text-xl mr-2"></i>
            A serving feeds one person for one meal.
        </p>
    </div>

    @if($meals)
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('peopleChefServeForm') }}"
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

    <x-analytics-tracker page="meals-form" />
</form>
