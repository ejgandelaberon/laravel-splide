<?php

namespace Emsephron\LaravelSplide;

use Emsephron\LaravelSplide\Concerns\CanMergeExtraComponentAttributes;
use Emsephron\LaravelSplide\Concerns\PreConfigurable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;

class SplideImage implements Htmlable
{
    use PreConfigurable;
    use CanMergeExtraComponentAttributes;

    protected string $view = 'splide::splide-image';

    protected string $alt = '';

    protected string $title;

    protected string $description;

    protected string $link;

    protected string $buttonText;

    final public function __construct(
        protected string $src
    ) {
        $this->preConfigure();
    }

    public static function make(string $src): static
    {
        return new static($src);
    }

    public function view(string $view): static
    {
        $this->view = $view;

        return $this;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function alt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }

    public function title(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title ?? null;
    }

    public function description(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description ?? null;
    }

    public function link(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link ?? null;
    }

    public function buttonText(string $buttonText): static
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->buttonText ?? null;
    }

    public function render(): View
    {
        return view($this->view, [
            'src' => $this->getSrc(),
            'alt' => $this->getAlt(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'link' => $this->getLink(),
            'buttonText' => $this->getButtonText(),
            'attributes' => new ComponentAttributeBag(),
            'extraAttributes' => $this->getExtraComponentAttributes(),
        ]);
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
