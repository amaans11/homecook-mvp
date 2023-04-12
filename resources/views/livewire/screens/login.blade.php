<div class="flex flex-col min-h-screen">
    <div class="flex justify-center my-10">
        <img src="{{ asset('images/logo.png') }}" class="h-8" />
    </div>

    <div class="h-full px-4 w-full max-w-md mx-auto">
        <form wire:submit.prevent="submit">
            <h1 class="text-2xl font-medium mb-5 text--primary uppercase">Login</h1>

            <div class="mb-6">
                <input
                    type="email"
                    class="rounded-lg border-0 w-full outline-none p-4 text-xl font-bold"
                    placeholder="{{ __('common.email') }}"
                    wire:model.defer="email"
                />
                @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <input
                    type="password"
                    class="rounded-lg border-0 w-full outline-none p-4 text-xl font-bold"
                    placeholder="{{ __('common.password') }}"
                    wire:model.defer="password"
                />
                @error('password') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <button
                type="submit"
                class="btn btn--primary w-full relative mt-2"
                wire:loading.attr="disabled"
            >
                Login
                <i class="fas fa-arrow-right text-xl absolute right-5"></i>
            </button>
        </form>
    </div>

    <x-analytics-tracker page="login" />
</div>
