<?php

namespace Codedor\SocialMediaLinks\Providers;

use Illuminate\Support\ServiceProvider;
use codedor\SocialMediaLinks\Share;

class SocialMediaLinksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerPublishing();
    }

    /**
     * Register the package's publishable resources
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../../config/social-media-links.php' =>
                        config_path('social-media-links.php'),

                    __DIR__ . '/../../resources/views' =>
                        resource_path('views/vendor/social-media-links'),

                    __DIR__ . '/../../dist/css' =>
                        public_path('/vendor/social-media-links/css'),

                    __DIR__ . '/../../dist/js' =>
                        public_path('/vendor/social-media-links/js'),
                ],
                ['social-media-links', 'codedor-social-media-links']
            );
        }
    }


    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Share::class, function ($app) {
            return new Share;
        });
        $this->app->alias(Share::class, 'share');

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/social-media-links.php',
            'social-media-links'
        );
    }
}
