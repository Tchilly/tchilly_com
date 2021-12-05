let mix = require('laravel-mix');
const {sourceMaps} = require("laravel-mix");
require('laravel-mix-workbox');

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

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .copyDirectory('resources/images', 'public/images')
    //.copy('resources/js/service-worker.js', 'public')
    .webpackConfig(require('./webpack.config'))
    .sourceMaps(false)

if (mix.inProduction()) {
    mix.version();
    mix.injectManifest({
        maximumFileSizeToCacheInBytes: 2194304,
        swSrc: './resources/js/service-worker.js'
    });
}
