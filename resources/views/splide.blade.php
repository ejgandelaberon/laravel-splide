<section
    id="{{ $name }}"
    class="splide laravel_splide"
    wire:ignore
    ax-load
    ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('laravel-splide-alpine', 'emsephron/laravel-splide') }}"
    ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('laravel-splide-styles', 'emsephron/laravel-splide') }}"
    x-ignore
    x-data="laravelSplide(@js($splideOptions))"
    {{ $attributes->merge($extraAttributes) }}
>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($images() as $image)
                <li class="splide__slide">{{ $image }}</li>
            @endforeach
        </ul>
    </div>
</section>
