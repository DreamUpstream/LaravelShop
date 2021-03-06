const mix = require("laravel-mix");

mix.version();
if (mix.inProduction()) {
    mix.sourceMaps();
}
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

mix.js("resources/js/app.js", "public/js/app.js");
mix.js("resources/js/products.js", "public/js/products.js");
mix.sass("resources/sass/app.scss", "public/css/app.css");
mix.copy("resources/webfonts", "public/webfonts", false);
