<div class="flex flex-col h-body w-full max-w-md mx-auto overflow-hidden py-4">
    <img src="{{ asset('images/chefs-image.png') }}" class="w-full mb-4" />
    <div class="flex flex-col justify-between w-full max-w-md mx-auto overflow-y-auto">
        <div>
            <h1 class="text-2xl text-gray-800 font-bold mb-4">👋 Thank you for becoming part of this early-bird group
            </h1>
            <p class="text-gray-700 mb-6">Our product is not quite ready yet. Once launched, we’ll be able to provide a
                personal cook for you. Thanks for your understanding.</p>
        </div>
        <div class="flex flex-col items-center text-center mb-5">
            <p class="text-3xl text-gray-800 font-bold">Give your feedback & win a <span class="text--primary">$100
                    Amazon Gift Card</span></p>
        </div>
        <div class="text-gray-700 text-center mb-4">
            <p class="mb-3">Answer a few short questions<br>and win <u>1 out of 10 $100 Amazon Gift Cards.</u>
            </p>
        </div>
    </div>
    <x-button as="a"
        href="https://mealstuff.typeform.com/to/MoBhBF8Y#project={{ env('ANALYTICS_PROJECT') }}&email={{ auth()->user()->email }}&source={{ auth()->user()->data->get('source_id') }}"
        class="btn--primary w-full mt-4">Start surey</x-button>

    <x-analytics-tracker page="Survey-completed" />
</div>
