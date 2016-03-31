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
    mix.sass('app.scss');

    // vue
    mix.copy('node_modules/vue/dist', 'public/static/vue');
    // vux
    mix.copy('node_modules/vux/components', 'public/static/vux/components');
    mix.copy('node_modules/vux/vux.js', 'public/static/vux/vux.js');
    mix.copy('node_modules/vux/vux.css', 'public/static/vux/vux.css');
});
