<label class="{{ $attributes->get('label-class') }}">
    <input
        name="{{ $attributes->get('name') }}"
        type="{{ $attributes->get('type') }}"
        class="hidden btn-checkbox"
        wire:model.lazy="{{ $attributes->get('name') }}"
        value="{{ $attributes->get('value') }}"
        checked="{{ $attributes->get('checked') }}"
        wire:loading.attr="disabled"
    >
    <div class="w-full cursor-pointer border border-blue-100 {{ $attributes->get('class') }}">
        {{ $slot }}
    </div>
</label>
