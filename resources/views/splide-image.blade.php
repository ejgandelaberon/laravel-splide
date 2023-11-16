<div>
    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge($extraAttributes, escape: false) }}>

    @if($title || $description)
        <div class="splide__title_and_desc">
            <p class="splide__title">{{ $title ?? '' }}</p>
            <p class="splide__description">{{ $description ?? '' }}</p>
        </div>
    @endif

    @if($link)
        <button>
            <a href="{{ $link }}" class="splide__button">
                {{ $buttonText ?? 'View' }}
            </a>
        </button>
    @endif
</div>
