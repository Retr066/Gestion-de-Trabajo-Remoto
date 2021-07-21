const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
mix.copy('node_modules/chart.js/dist/chart.js', 'public/chart.js/chart.js')
mix.copy('node_modules/pusher-js/dist/web/pusher.min.js', 'public/pusher-js/pusher.min.js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),


    ]);

mix.browserSync('127.0.0.1:8000');


if (mix.inProduction()) {
    mix.version();
}
