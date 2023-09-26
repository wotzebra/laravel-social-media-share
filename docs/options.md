## Options

### Font Awesome

You can change the default icons you want to use in the config file:

```config/social-media-share.php```

Laravel Social media links uses Font Awesome v5 by default but you can replace it to any version you are using.


### Add extra classes to the social media links

You can add extra class(es) by passing an array as the second parameter on the currentPage method.

```php
<x-social-media-share-share
    :title='$model->title'
    extra-classes='my-class my-extra-class'
/>
```

Which will generate following html

```html
<div id="js-social-media-share" class="social-media">
    <ul class="social-media-share">
        <li>
            <a class="js-social-media-share my-class my-extra-class" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                <i class="fab fa-lg fa-facebook-square"></i>
            </a>
        </li>
    </ul>
</div>
```

### Custom wrapping

By default social links will are wrapped in the following html

```html
<div id="js-social-media-share" class="social-media">
    <ul class="social-media-share">
        <!-- social media links will be added here -->
    </ul>
</div>
```

This can be customised by passing the prefix as the third and suffix as the fourth parameter.

```php
<x-social-media-share-share
    :title='$model->title'
    prefix='<ul id="js-social-media-share" class="social-media-share">'
/>
```
Please keep in mind you need to have the **js-social-media-share** id present for the javascript to do its magic.

This will output the following html.

```html
<ul id="js-social-media-share" class="social-media-share">
    <li>
        <a class="js-social-media-share" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
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
php artisan vendor:publish --tag=codedor-social-media-share-uncompiled
```

However this requires you to add the following lines to your webpack.mix.js file

```html
  .js('resources/js/social-media-share.js', 'js')
  .sass('resources/sass/social-media-share.scss', 'css')
```

And update the asset links in **resources/views/vendor/social-media-share/components/share.blade.php** to:
```html
 <link href="{{ mix('css/social-media-share.css') }}"
    rel="stylesheet"
    media="screen"
    type="text/css">

<script src="{{ mix('js/social-media-share.js') }}"></script>
```
