<?php

namespace Emsephron\LaravelSplide\Concerns;

use Closure;

trait PreConfigurable
{
    protected static array $preConfigurations = [];

    public static function preConfigurations(Closure $callback): void
    {
        static::$preConfigurations[static::class] ??= [];
        static::$preConfigurations[static::class][] = $callback;
    }

    public function preConfigure(): static
    {
        foreach (static::$preConfigurations as $classToConfigure => $configurationCallbacks) {
            if (!$this instanceof $classToConfigure) {
                continue;
            }

            foreach ($configurationCallbacks as $configure) {
                $configure($this);
            }
        }

        return $this;
    }
}
