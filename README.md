# Laravel Social Media Links

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package allows you to drop a social media links component on any page in your application. It can be used renderless without any dependencies or with a couple of default styling options using built-in SVG's or Font Awesome.
This package is heavily inspired by the jorenvanhocht/laravel-share package.

## Installation

You can install the package via composer:

``` bash
composer require codedor/laravel-social-media-links
```

Publish the package config & resource files.

```bash
php artisan vendor:publish --tag=codedor-social-media-links
```

## Usage

Add the following line to any blade temaplte where you want the social media links to appear.

```blade
@include('share::components.social_media_links', ['title' => $model->title, 'linkedinSummary' => $model->intro ])
```

This generates:

```html
<div id="js-social-media" class="social-media">
    <ul class="social-media-links">
        <li>
            <a class="" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
        <li>
            <a class="" href="http://www.linkedin.com/shareArticle?mini=true&title=pageTitle&summary=pageSummary&url=https://example.com/your-page">
                <i class="fab fa-lg fa-linkedin-square"></i>
            </a>
        </li>
        <li>
            <a class="" href="https://twitter.com/intent/tweet?text=pageTitle&url=https://example.com/your-page">
                <i class="fab fa-lg fa-twitter-square"></i>
            </a>
        </li>
    </ul>
</div>
```

Edit the resources/views/vendor/social_media_links.blade.php view to add or remove services.

### Available services

* Facebook - Twitter - Linkedin (Default component)
* WhatsApp - Reddit - Telegram - Pintrest


### Alternative usage

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
    ->toPinterest();
```

### Fontawesome

You can change the default Fontawesome icon you want to use in:

 ```config/social-media-links.php```

Laravel Social media links supports Font Awesome v5,


#### Add extra classes to the social media links

You can simply add extra class(es) by passing an array as the second parameter on the currentPage method.

```php
Share::currentPage('Page Title', ['class' => 'my-class'])
    ->toFacebook();
```

Which will generate following html

```html
<div id="js-social-media" class="social-media">
    <ul class="social-media-links">
        <li>
            <a class="" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
    </ul>
</div>
```

#### Custom wrapping

By default social links will be wrapped in the following html

```html
<div id="js-social-media" class="social-media">
	<ul>
		<!-- social media links will be added here -->
	</ul>
</div>
```

This can be customised by passing the prefix as the third and suffix as the fourth parameter.

```php
Share::currentPage('Page Title', [], '<ul id="js-social-media" class="social-media my-class">', '</ul>')
        ->toFacebook();
```
Please keep in mind you need to have the js-social-media id present for the javascript to do its magic.

This will output the following html.

```html
<ul id="js-social-media" class="social-media-links">
    <li>
        <a class="" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel Social Sharing, please send an e-mail to Sofian Mourabit via [sofian@codedor.be](mailto:sofian@codedor.be). All security vulnerabilities will be promptly addressed.

## License

This package is open-source software licensed under the [MIT License](LICENSE.md).