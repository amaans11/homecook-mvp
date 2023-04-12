<div class="flex flex-col min-h-body py-4">
    <form wire:submit.prevent="submit" class="h-full w-full max-w-md mx-auto mt-5">
        <h1 class="text-4xl font-bold mb-8">Let’s personalize your experience</h1>

        <p class="mb-8">
            Answer a few questions so we can recommend tailored Chefs & Menus.<br>👇
        </p>

        <div class="mb-6">
            <x-input type="text" placeholder="What’s your name?" class="w-full" wire:model.defer="name" />
            @error('name') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="mb-10">
            <x-input type="email" placeholder="Enter your email" class="w-full" wire:model.defer="email" />
            @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>

        <x-button type="submit" class="w-full btn--primary" wire:loading.attr="disabled">
            Lets Begin
        </x-button>
        <x-analytics-tracker page="welcome" />
    </form>
</div>
