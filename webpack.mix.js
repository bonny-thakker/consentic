let mix = require('laravel-mix');
let exec = require('child_process').exec;
let path = require('path');

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

// Spark
mix
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
    .sass('resources/sass/app-rtl.scss', 'public/css')
    .then(() => {
        exec('node_modules/rtlcss/bin/rtlcss.js public/css/app-rtl.css ./public/css/app-rtl.css');
    })
    .version(['public/css/app-rtl.css'])
    .webpackConfig({
        resolve: {
            modules: [
                path.resolve(__dirname, 'vendor/laravel/spark-aurelius/resources/assets/js'),
                'node_modules'
            ],
            alias: {
                'vue$': mix.inProduction() ? 'vue/dist/vue.min' : 'vue/dist/vue.js'
            }
        }
    });

// App
mix.js('resources/js/app/app.js', 'public/assets/app/js')
    .sass('resources/sass/app/app.scss', 'public/assets/app/css')

// Web
mix.js('resources/js/web/app.js', 'public/assets/web/js')
    .sass('resources/sass/web/app.scss', 'public/assets/web/css')
    .sass('resources/sass/web/auth.scss', 'public/assets/web/css');

// Libs
mix.js('resources/js/newsletter.js', 'public/js');