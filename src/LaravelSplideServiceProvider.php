<?php

namespace Emsephron\LaravelSplide;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSplideServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-splide')
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }
}
