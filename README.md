# Laravel Social Media Links

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package allows you to drop a social media links component on any page in your application. It can be used using Font Awesome and some default css or renderless without any styling and dependencies using SVG's.
This package is heavily inspired by the jorenvanhocht/laravel-share package.

## Installation

You can install the package via composer:

```bash
composer require codedor/laravel-social-media-links
```

Publish the package config & resource files.

```bash
php artisan vendor:publish --tag=codedor-social-media-links
```

## Usage

Add the following line to any blade temaplte where you want the social media links to appear.
```blade
@include('components.share', [
            'title' => $model->title,
            'summary' => $model->intro
])
```

OR
```blade
@include('vendor.social-media-links.social_media_links', ['title' => $model->title, 'linkedinSummary' => $model->intro ])

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
<div id="js-social-media-links" class="social-media">
    <ul class="social-media-links">
        <li>
            <a class="js-social-media-link" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
        <li>
            <a class="js-social-media-link" href="http://www.linkedin.com/shareArticle?mini=true&title=pageTitle&summary=pageSummary&url=https://example.com/your-page">
                <i class="fab fa-lg fa-linkedin-square"></i>
            </a>
        </li>
        <li>
            <a class="js-social-media-link" href="https://twitter.com/intent/tweet?text=pageTitle&url=https://example.com/your-page">
                <i class="fab fa-lg fa-twitter-square"></i>
            </a>
        </li>
    </ul>
</div>
```

Go to **resources/views/vendor/social_media_links.blade.php** to add or remove social media services.

### Available services

* Facebook - Twitter - Linkedin (Default component)
* WhatsApp - Reddit - Telegram - Pintrest

## Alternative usage

### Creating a social media link

The easiest way to share a page is to use:

```php
Share::currentPage('Page Title')->toFacebook();
```

### Creating multiple social media Links

You can easely create multiple share links at once by chaining the social methods:

```php
Share::currentPage('Page Title')
    ->toFacebook()
    ->toTwitter()
    ->toLinkedin('Linkedin accepts an extra summary here')
    ->toWhatsapp()
    ->toReddit()
    ->toTelegram()
    ->toPinterest()
    ->toMail()
    ->toClipboard();
```

## Options

### Font Awesome

You can change the default icons you want to use in the config file:

 ```config/social-media-links.php```

Laravel Social media links uses Font Awesome v5 by default but you can replace it to any version you are using.


### Add extra classes to the social media links

You can add extra class(es) by passing an array as the second parameter on the currentPage method.

```php
Share::currentPage('Page Title', ['class' => 'my-class'])
    ->toFacebook();
```

Which will generate following html

```html
<div id="js-social-media-links" class="social-media">
    <ul class="social-media-links">
        <li>
            <a class="js-social-media-link my-class" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
    </ul>
</div>
```

### Custom wrapping

By default social links will are wrapped in the following html

```html
<div id="js-social-media-links" class="social-media">
    <ul>
        <!-- social media links will be added here -->
    </ul>
</div>
```

This can be customised by passing the prefix as the third and suffix as the fourth parameter.

```php
Share::currentPage('Page Title', [], '<ul id="js-social-media-links" class="social-media my-class">', '</ul>')
        ->toFacebook();
```
Please keep in mind you need to have the **js-social-media-links** id present for the javascript to do its magic.

This will output the following html.

```html
<ul id="js-social-media-links" class="social-media-links">
    <li>
        <a class="js-social-media-link" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
            <i class="fab fa-lg fa-facebook-square"></i>
        </a>
    </li>
</ul>
```

#### Sharing a custom url

You can specify the page you which to share manually using the `page` function

```php
Share::page('https://example.com/your-page')->toFacebook();
```

#### Customizing the source assets

If needed you can publish the package uncompiled js and sass files using the following tag:

```bash
php artisan vendor:publish --tag=codedor-social-media-links-uncompiled
```

However this requires you to add the following lines to your webpack.mix.js file

```html
  .js('resources/js/social-media-links.js', 'js')
  .sass('resources/sass/social-media-links.scss', 'css')
```

And update the asset links in **resources/views/vendor/social_media_links.blade.php** to:
```html
 <link href="{{ mix('css/social-media-links.css') }}"
    rel="stylesheet"
    media="screen"
    type="text/css">

<script src="{{ mix('js/social-media-links.js') }}"></script>
```
## Upgrading from 1.0.x to 2.0.x

To upgrade from 1.x simply republish the config file using the following command:

```bash
php artisan vendor:publish --provider="Codedor\SocialMediaLinks\Providers\SocialMediaLinksServiceProvider" --force
```

Note that if you made changes made to the config file or view, for example changed a sharing icon you will need to change this again.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel Social Sharing, please send an e-mail to Sofian Mourabit via [sofian@codedor.be](mailto:sofian@codedor.be). All security vulnerabilities will be promptly addressed.

## License

This package is open-source software licensed under the [MIT License](LICENSE.md).
