const mix = require('laravel-mix');

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

// App
mix.js('resources/js/app/app.js', 'public/assets/app/js')
    .sass('resources/sass/app/app.scss', 'public/assets/app/css')

// Web
mix.js('resources/js/web/app.js', 'public/assets/web/js')
    .sass('resources/sass/web/app.scss', 'public/assets/web/css')
    .sass('resources/sass/web/auth.scss', 'public/assets/web/css');

// Libs
mix.js('resources/js/newsletter.js', 'public/js');