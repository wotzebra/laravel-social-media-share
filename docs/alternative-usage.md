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

OR

<x-social-media-share-share
    :title='$model->title'
    :summary='$model->intro'
    facebook
    twitter
    linkedin
    whatsapp
    reddit
    telegram
    pinterest
    mail
    clipboard
/>
```
