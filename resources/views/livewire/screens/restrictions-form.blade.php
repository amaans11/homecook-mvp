<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 3 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-8 flex-shrink-0">Do you have any dietary restrictions?</h1>

        <div class="flex mb-10 flex-shrink-0">
            <label class="flex items-center text-gray-700 mr-8">
                <input
                    name="haveRestrictions"
                    type="radio"
                    class="appearance-none rounded text-green-600 focus:outline-none checked:bg-green-600 checked:border-transparent w-4 h-4 mr-2"
                    wire:model="haveRestrictions"
                    value="true"
                    checked="{{ $haveRestrictions === 'true' ? 'true' : 'false' }}"
                />
                Yes
            </label>
            <label class="flex items-center text-gray-700">
                <input
                    name="haveRestrictions"
                    type="radio"
                    class="appearance-none rounded text-green-600 focus:outline-none checked:bg-green-600 checked:border-transparent w-4 h-4 mr-2"
                    wire:model="haveRestrictions"
                    value="false"
                    checked="{{ $haveRestrictions === 'false' ? 'true' : 'false' }}"
                />
                Not any specific
            </label>
        </div>
        @error('haveRestrictions') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror

        @if($haveRestrictions === 'true')
            <p class="text-base text-gray-500 font-medium mb-5 flex-shrink-0">Choose from the following dietary restrictions</p>

            <div class="flex flex-row flex-wrap overflow-y-auto">
                @foreach($options as $value => $text)
                    <x-checkbox-card
                        name="restrictions"
                        type="checkbox"
                        value="{{ $value }}"
                        checked="{{ in_array($value, $restrictions) ? 'true' : 'false' }}"
                        label-class="mr-3 mb-3"
                        class="flex flex-col justify-center items-center text-center py-2 px-4 rounded-full"
                    >
                        {{ $text }}
                    </x-checkbox-card>
                @endforeach
            </div>
            @error('restrictions') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        @endif
    </div>

    @if($haveRestrictions === 'false' || ($haveRestrictions === 'true' && count($restrictions)))
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('foodGoalForm') }}"
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

    <x-analytics-tracker page="restrictions-form" />
</form>
