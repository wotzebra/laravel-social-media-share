<?php

namespace Codedor\SocialMediaShare;

use Codedor\SocialMediaShare\Components\Share as ComponentsShare;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialMediaShareServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package) : void
    {
        $package->name('social-media-share')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasViewComponent('social-media-share', ComponentsShare::class);
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
        $this->publishes(
            [
                __DIR__ . '/../resources/sass' =>
                    resource_path('/vendor/social-media-share/css'),
                __DIR__ . '/../resources/js' =>
                    resource_path('/vendor/social-media-share/js'),
            ],
            'codedor-social-media-share-uncompiled'
        );
    }
}
