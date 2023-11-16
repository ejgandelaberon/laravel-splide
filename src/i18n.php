<?php

namespace Emsephron\LaravelSplide;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @implements Arrayable<string, string|null>
 */
class i18n implements Arrayable
{
    protected ?string $prev = null;

    public function prev(?string $prev): static
    {
        $this->prev = $prev;

        return $this;
    }

    public function getPrev(): ?string
    {
        return $this->prev;
    }

    protected ?string $next = null;

    public function next(?string $next): static
    {
        $this->next = $next;

        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    protected ?string $first = null;

    public function first(?string $first): static
    {
        $this->first = $first;

        return $this;
    }

    public function getFirst(): ?string
    {
        return $this->first;
    }

    protected ?string $last = null;

    public function last(?string $last): static
    {
        $this->last = $last;

        return $this;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    protected ?string $slideX = null;

    public function slideX(?string $slideX): static
    {
        $this->slideX = $slideX;

        return $this;
    }

    public function getSlideX(): ?string
    {
        return $this->slideX;
    }

    protected ?string $pageX = null;

    public function pageX(?string $pageX): static
    {
        $this->pageX = $pageX;

        return $this;
    }

    public function getPageX(): ?string
    {
        return $this->pageX;
    }

    protected ?string $play = null;

    public function play(?string $play): static
    {
        $this->play = $play;

        return $this;
    }

    public function getPlay(): ?string
    {
        return $this->play;
    }

    protected ?string $pause = null;

    public function pause(?string $pause): static
    {
        $this->pause = $pause;

        return $this;
    }

    public function getPause(): ?string
    {
        return $this->pause;
    }

    protected ?string $carousel = null;

    public function carousel(?string $carousel): static
    {
        $this->carousel = $carousel;

        return $this;
    }

    public function getCarousel(): ?string
    {
        return $this->carousel;
    }

    protected ?string $select = null;

    public function select(?string $select): static
    {
        $this->select = $select;

        return $this;
    }

    public function getSelect(): ?string
    {
        return $this->select;
    }

    protected ?string $slide = null;

    public function slide(?string $slide): static
    {
        $this->slide = $slide;

        return $this;
    }

    public function getSlide(): ?string
    {
        return $this->slide;
    }

    protected ?string $slideLabel = null;

    public function slideLabel(?string $slideLabel): static
    {
        $this->slideLabel = $slideLabel;

        return $this;
    }

    public function getSlideLabel(): ?string
    {
        return $this->slideLabel;
    }

    /**
     * @return array<string, string|null>
     */
    public function toArray(): array
    {
        return [
            'prev' => $this->getPrev(),
            'next' => $this->getNext(),
            'first' => $this->getFirst(),
            'last' => $this->getLast(),
            'slideX' => $this->getSlideX(),
            'pageX' => $this->getPageX(),
            'play' => $this->getPlay(),
            'pause' => $this->getPause(),
            'carousel' => $this->getCarousel(),
            'select' => $this->getSelect(),
            'slide' => $this->getSlide(),
            'slideLabel' => $this->getSlideLabel(),
        ];
    }
}
