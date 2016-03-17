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

elixir(function (mix) {
    mix.styles([, 'theme.css', 'custom.css', 'sunburst.css', 'sweetalert.css'], './public/assets/css/app.min.css')
        .scripts(['jquery.js', 'ZeroClipboard.min.js', 'bootstrap.js', 'prettify_code.js', 'sweetalert-dev.js', 'main.js'], './public/assets/js/app.min.js');
});
