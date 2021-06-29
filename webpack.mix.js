const mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath('resources/dist')
  .js('resources/js/social-media-links.js', 'js')
  .sass('resources/sass/social-media-links.scss', 'css')
  .sourceMaps()
  .webpackConfig({
    devtool: 'source-map'
  })
