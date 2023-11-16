<div
    ax-load
    ax-load-src="{{ asset('vendor/splide/splide.js') }}"
    x-data="laravelSplide(@js($splideOptions))"
    {{ $attributes->merge($extraAttributes) }}
>
    <section id="{{ $name }}" class="splide laravel_splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($images() as $image)
                    <li class="splide__slide">{{ $image }}</li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
