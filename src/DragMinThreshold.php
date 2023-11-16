<?php

namespace Emsephron\LaravelSplide;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @implements Arrayable<string, int>
 */
class DragMinThreshold implements Arrayable
{
    protected ?int $mouse = null;

    public function mouse(?int $value): static
    {
        $this->mouse = $value;

        return $this;
    }

    public function getMouse(): ?int
    {
        return $this->mouse;
    }

    protected ?int $touch = null;

    public function touch(?int $value): static
    {
        $this->touch = $value;

        return $this;
    }

    public function getTouch(): ?int
    {
        return $this->touch;
    }

    /**
     * @return array{ mouse?: int, touch?: int }
     */
    public function toArray(): array
    {
        return array_filter([
            'mouse' => $this->getMouse(),
            'touch' => $this->getTouch(),
        ]);
    }
}
