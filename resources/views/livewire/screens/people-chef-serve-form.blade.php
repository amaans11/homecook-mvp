<form wire:submit.prevent="submit" class="flex flex-col justify-between h-body overflow-hidden py-4">
    <div class="flex flex-col w-full max-w-md mx-auto overflow-hidden">
        <x-progress-bar value="{{ 5 * (100/8) }}" class="mb-6 mt-3 flex-shrink-0" />

        <h1 class="text-4xl font-bold mb-10 flex-shrink-0">How many people would Chef serve?</h1>

        <div class="grid grid-cols-2 gap-3 overflow-y-auto">
            @foreach($options as $value => $text)
                <x-checkbox-card
                    name="peopleChefServe"
                    type="radio"
                    value="{{ $value }}"
                    checked="{{ $value === $peopleChefServe ? 'true' : 'false' }}"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
                >
                    {{ $text }}
                </x-checkbox-card>
            @endforeach
        </div>
        @error('peopleChefServe') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    @if($peopleChefServe)
        <div class="grid grid-cols-2 gap-2 w-full max-w-md mx-auto pt-4 mt-4 border-t border-gray-200">
            <x-button
                as="a"
                href="{{ route('favoriteCuisineForm') }}"
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

    <x-analytics-tracker page="people-chef-serve" />
</form>
