<{{ $attributes->get('as') ?? 'button' }}
    {{ $attributes->merge(['class' => 'btn rounded-full no-underline inline-flex items-center justify-center text-center font-base text-sm py-5 px-6']) }}
>
    {{ $slot }}
</{{ $attributes->get('as') ?? 'button' }}>
