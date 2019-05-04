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

mix
   //  .js('resources/js/app.js', 'public/app/dist/js')
   // .sass('resources/sass/app.scss', 'public/app/dist/css')
   //  .combine([
   //      'node_modules/angular/angular.min.js',
   //      'node_modules/@uirouter/angularjs/release/angular-ui-router.js',
   //      'node_modules/angular-resource/angular-resource.min.js',
   //      'node_modules/angular-animate/angular-animate.min.js',
   //      'node_modules/angular-toastr/dist/angular-toastr.tpls.min.js',
   //  ], 'public/app/dist/js/angular.js')
    .combine([
        'public/app/app.js',
        'public/app/modules/**/*Module.js',
        'public/app/modules/**/*State.js',
        'public/app/services/**/*Service.js'
    ], 'public/app/dist/js/angular-app.js')
    .sourceMaps();
