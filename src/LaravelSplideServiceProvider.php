<?php

namespace Emsephron\LaravelSplide;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
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

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName(),
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'emsephron/laravel-splide';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            AlpineComponent::make('laravel-splide-alpine', __DIR__ . '/../resources/dist/splide.js'),
            Css::make('laravel-splide-styles', __DIR__ . '/../resources/dist/splide.css'),
        ];
    }
}
