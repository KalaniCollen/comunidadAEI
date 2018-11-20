let mix = require('laravel-mix');

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


mix.js('resources/assets/js/app.js', 'public/js')
    .copy('node_modules/@glidejs/glide/dist/glide.min.js', 'public/js')
    .copy('node_modules/masonry-layout/masonry.js', 'public/js')
    .copy('resources/assets/js/dropzone.js', 'public/js')
    .copyDirectory('resources/assets/fonts', 'public/fonts')
    .copyDirectory('resources/assets/imgs', 'public/img')
    .sass('resources/assets/sass/app.scss', 'public/css');
