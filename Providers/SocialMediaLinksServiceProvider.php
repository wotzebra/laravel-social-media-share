<?php

namespace Codedor\SocialMediaLinks\Providers;

use Codedor\SocialMediaLinks\Share;
use Codedor\SocialMediaLinks\View\Components\Share as ComponentsShare;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialMediaLinksServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package) : void
    {
        $package->name('social-media-links')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasViewComponent('social-media-links', ComponentsShare::class);
    }

    public function registeringPackage()
    {
        $this->app->singleton(Share::class, function ($app) {
            return new Share;
        });

        $this->app->alias(Share::class, 'share');
    }

    public function bootingPackage()
    {
        $this->publishes([
                __DIR__ . '/../../resources/sass' =>
                    resource_path('/vendor/social-media-links/css'),
                __DIR__ . '/../../resources/js' =>
                    resource_path('/vendor/social-media-links/js'),
            ],
            'codedor-social-media-links-uncompiled'
        );
    }
}
