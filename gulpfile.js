var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', './public/css/app.css')
        .sass('api.scss', './public/css/api.css')
        .sass('backend.scss', './public/css/backend.css')
        .sass('backend-custom.scss', './public/css/backend-custom.css');
});
