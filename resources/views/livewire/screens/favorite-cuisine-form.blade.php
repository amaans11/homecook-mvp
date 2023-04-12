<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 4 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-3 flex-shrink-0">What cuisines interest you?</h1>
        <p class="text--primary text-sm mb-8 font-medium flex-shrink-0">(choose any that apply) </p>

        <div class="overflow-y-auto">
            <div class="flex flex-row flex-wrap">
                @foreach($options as $value => $text)
                    <x-checkbox-card
                        name="cuisines"
                        type="checkbox"
                        value="{{ $value }}"
                        checked="{{ in_array($value, $cuisines) ? 'true' : 'false' }}"
                        label-class="mr-3 mb-3"
                        class="flex flex-col justify-center items-center text-center py-2 px-4 rounded-full"
                    >
                        {{ $text }}
                    </x-checkbox-card>
                @endforeach
            </div>
            <div
                class="cursor-pointer border border--primary inline-flex flex-col justify-center items-center text-center py-2 px-6 rounded-full uppercase"
                wire:click="selectAll"
            >
                Select all
            </div>
        </div>
        @error('cuisines') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    @if(count($cuisines))
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('restrictionsForm') }}"
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

    <x-analytics-tracker page="favorite-cusine-form" />
</form>
