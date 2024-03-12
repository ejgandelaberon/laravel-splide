<?php

namespace Emsephron\LaravelSplide;

use Emsephron\LaravelSplide\Concerns\CanMergeExtraComponentAttributes;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class SplideComponent extends Component
{
    use CanMergeExtraComponentAttributes;

    protected $except = [
        'extraAttributes',
        'getExtraComponentAttributes',
        'getExtraAttributeBag',
    ];

    protected string $view = 'splide::splide';

    public function __construct(public Options $splideOptions)
    {
        $ariaLabel = $this->splideOptions->getLabel() ?? $this->defaultAriaLabel();

        $this->configure(
            $this->splideOptions->label($ariaLabel)
        );
    }

    protected static function defaultAriaLabel(): string
    {
        return Str::of(static::class)->afterLast('\\')->ucsplit()->implode(' ');
    }

    abstract public function name(): string;

    /**
     * @return SplideImage[]
     */
    abstract public function images(): array;

    abstract protected function configure(Options $options): void;

    public function render(): View
    {
        return view($this->view, [
            'extraAttributes' => $this->getExtraComponentAttributes(),
        ]);
    }
}
