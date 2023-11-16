<?php

namespace Emsephron\LaravelSplide;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @implements Arrayable<string, mixed>
 */
class Padding implements Arrayable
{
    protected int|string|null $left = null;

    public function left(int|string|null $left): self
    {
        $this->left = $left;

        return $this;
    }

    public function getLeft(): int|string|null
    {
        return $this->left;
    }

    protected int|string|null $right = null;

    public function right(int|string|null $right): self
    {
        $this->right = $right;

        return $this;
    }

    public function getRight(): int|string|null
    {
        return $this->right;
    }

    protected int|string|null $top = null;

    public function top(int|string|null $top): self
    {
        $this->top = $top;

        return $this;
    }

    public function getTop(): int|string|null
    {
        return $this->top;
    }

    protected int|string|null $bottom = null;

    public function bottom(int|string|null $bottom): self
    {
        $this->bottom = $bottom;

        return $this;
    }

    public function getBottom(): int|string|null
    {
        return $this->bottom;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return array_filter([
            'left' => $this->getLeft(),
            'right' => $this->getRight(),
            'top' => $this->getTop(),
            'bottom' => $this->getBottom(),
        ]);
    }
}
