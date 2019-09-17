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

mix.js('resources/js/app.js', 'public/js')
//     .eslint({
//     enforce: 'pre',
//     test: ['js', 'vue'], // will convert to /\.(js|vue)$/ or you can use /\.(js|vue)$/ by itself.
//     exclude: ['node_modules', 'vendor'], // will convert to regexp and work. or you can use a regular expression like /node_modules/,
//     loader: 'eslint-loader',
//     options: {
//         fix: true,
//         cache: false,
//         //...
//     }
// })
    .sass('resources/sass/app.scss', 'public/css');
mix.scripts([
    'storage/frontend/js/jquery-ui.js',
    'node_modules/jquery-backstretch/jquery.backstretch.js',
    'node_modules/jquery-parallax.js/parallax.min.js',
    'storage/frontend/js/jquery.kwicks.js',
    'storage/frontend/js/bootstrap.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/vegas/dist/vegas.min.js',
    'storage/frontend/js/tinymce.min.js',
    'node_modules/toastr/build/toastr.min.js',
    'storage/frontend/js/script.js',
    'storage/frontend/js/scripts.js',
    'storage/frontend/js/shared.js',
    'storage/frontend/js/signup.js',
    'storage/frontend/js/functions.js',
], 'public/js/frontend.js');

mix.styles([
    'storage/frontend/css/bootstrap.css',
    'storage/frontend/css/jquery.kwicks.css',
    'node_modules/hover.css/css/hover-min.css',
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/vegas/dist/vegas.min.css',
    'node_modules/toastr/build/toastr.min.css',
    'storage/frontend/css/style.css',
],'public/css/frontend.css');

mix.copy('storage/frontend/fonts', 'public/fonts');
mix.copy('storage/frontend/img', 'public/img');
mix.copy('storage/frontend/css/images', 'public/images');
mix.copy('storage/frontend/favicon.ico', 'public/favicon.ico');
mix.copy('storage/frontend/robots.txt', 'public/robots.txt');
mix.copy('node_modules/vegas/dist/overlays', 'public/overlays');
