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
    //mix.sass('app.scss');

    mix.styles([
    	"bootstrap.css",
    	"material-fullpalette.css",
    	"material.css",
    	"ripples.css",
    	"roboto.css"
    ]);

    mix.scripts([
        "app.js",
    	"material.js",
    	"ripples.js"
    ]);

    mix.version(["css/all.css","js/all.js"]);
});
