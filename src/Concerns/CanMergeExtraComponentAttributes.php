<?php

namespace Emsephron\LaravelSplide\Concerns;

use Illuminate\View\ComponentAttributeBag;

trait CanMergeExtraComponentAttributes
{
    protected array $extraComponentAttributes = [];

    public function extraAttributes(array $attributes, bool $merge = false): static
    {
        if ($merge) {
            $this->extraComponentAttributes[] = $attributes;
        } else {
            $this->extraComponentAttributes = [$attributes];
        }

        return $this;
    }

    public function getExtraComponentAttributes(): array
    {
        $temporaryAttributeBag = new ComponentAttributeBag();

        foreach ($this->extraComponentAttributes as $extraAttributes) {
            $temporaryAttributeBag = $temporaryAttributeBag->merge($extraAttributes);
        }

        return $temporaryAttributeBag->getAttributes();
    }

    public function getExtraAttributeBag(): ComponentAttributeBag
    {
        return new ComponentAttributeBag($this->getExtraComponentAttributes());
    }
}
