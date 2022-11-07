# Upgrading

## Upgrading from 2.x to 3.x
To upgrade to 3.x you need Laravel version 8.x.

Replace the blade includes with blade components like the following example:
```php
@include('components.share', [
    'title' => $model->title,
    'summary' => $model->intro
])

<x-social-media-share-share
    :title='$model->title'
    :summary='$model->intro'
/>
```

And republish your assets
```bash
php artisan vendor:publish --provider="Codedor\SocialMediaShare\SocialMediaShareServiceProvider" --force
```

## Upgrading from 1.0.x to 2.0.x

To upgrade from 1.x simply republish the config, assets and view files using the following command:

```bash
php artisan vendor:publish --provider="Codedor\SocialMediaShare\SocialMediaShareServiceProvider" --force
```

Note that if you made changes made to the config file or view, for example changed a sharing icon you will need to change this again. Use `git diff` to undo the changes that are not necessary.

Make sure these are in your layouts file:
```blade
@stack('head')
```

```blade
@stack('scripts')
```
