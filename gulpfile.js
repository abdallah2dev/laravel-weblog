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
    mix.sass('app.scss')
        .webpack('app.js', '', '', {
            module: {
                loaders: [
                    {
                        test: require.resolve("blueimp-file-upload"),
                        loader: "imports?define=>false"
                    },
                    {
                        test: require.resolve("medium-editor-insert-plugin"),
                        loader: "imports?define=>false"
                    }
                ]
            }
        })
        .copy('node_modules/font-awesome/fonts','public/build/fonts')
        .version([
            './public/css/app.css',
            './public/js/app.js'
        ]);
});
