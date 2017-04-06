const { mix } = require('laravel-mix');

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

// mix.webpackConfig({
//   devServer:{
//     headers: {
//       'Access-Control-Allow-Origin':'*'
//     }
//   }
// });

mix.js(['resources/assets/js/app.js','resources/assets/js/test.js'], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.browserSync('localhost/todo-app/public'); // THIS WILL CAUSE PROBLEMS WITH AJAX-BASED SITES