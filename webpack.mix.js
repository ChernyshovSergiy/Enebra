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

mix.js('resources/js/app.js', 'public/js').eslint({
    enforce: 'pre',
    test: ['js', 'vue'], // will convert to /\.(js|vue)$/ or you can use /\.(js|vue)$/ by itself.
    exclude: ['node_modules', 'vendor'], // will convert to regexp and work. or you can use a regular expression like /node_modules/,
    loader: 'eslint-loader',
    options: {
        fix: true,
        cache: false,
        //...
    }
})
    .sass('resources/sass/app.scss', 'public/css');
