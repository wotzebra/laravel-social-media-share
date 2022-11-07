# Laravel Social Media Share

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package allows you to drop a social media links component on any page in your application. It can be used using Font Awesome and some default css or renderless without any styling and dependencies using SVG's.
This package is heavily inspired by the jorenvanhocht/laravel-share package.

## Installation

You can install the package via composer:

```bash
composer require codedor/laravel-social-media-share
```

Publish the package config & resource files.

```bash
php artisan vendor:publish --tag=codedor-social-media-share
```

## Usage

Add the following line to any blade template where you want the social media links to appear.

```blade
<x-social-media-share-share
    :title="$model->title"
    :summary="$model->intro"
/>
```

To pull in the CSS add this line to the bottom of your HEAD tag in your **default.blade.php** file

```blade
@stack('head')
```

To pull in the javascript add this line right **before** the closing BODY tag in your **default.blade.php** file

```blade
@stack('scripts')
```

This generates:

```html
<div id="js-social-media-share" class="social-media">
    <ul class="social-media-share">
        <li>
            <a class="js-social-media-share" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
        <li>
            <a class="js-social-media-share" href="http://www.linkedin.com/shareArticle?mini=true&title=pageTitle&summary=pageSummary&url=https://example.com/your-page">
                <i class="fab fa-lg fa-linkedin-square"></i>
            </a>
        </li>
        <li>
            <a class="js-social-media-share" href="https://twitter.com/intent/tweet?text=pageTitle&url=https://example.com/your-page">
                <i class="fab fa-lg fa-twitter-square"></i>
            </a>
        </li>
    </ul>
</div>
```

## Documentation

For the full documentation, check [here](./docs/index.md).

## Testing

```bash
vendor/bin/phpunit
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Upgrading

Please see [UPGRADING](UPGRADING.md) for more information on how to upgrade to a new version.
