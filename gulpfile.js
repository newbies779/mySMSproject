var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');

require('laravel-elixir-sass-compass');
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

var paths = {
    'jquery': './resources/assets/bower_components/jquery/',
    'bootstrap': './resources/assets/bower_components/bootstrap/',
    'tether': './resources/assets/bower_components/tether/',
    'assets': './resources/assets/',
    'moment': './resources/assets/bower_components/moment/',
    'datetimepicker': './resources/assets/bower_components/eonasdan-bootstrap-datetimepicker/',
    'jqueryForm': './resources/assets/bower_components/jquery-form/'
}

elixir(function(mix) {
    mix.sass("bootstrap.scss", 'public/css/', { includePaths: [paths.bootstrap + 'scss/'] })
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.tether + "dist/js/tether.js",
            paths.bootstrap + "dist/js/bootstrap.js",
            paths.moment + "min/moment-with-locales.min.js",
            paths.moment + "locale/th.js",
            paths.datetimepicker + "build/js/bootstrap-datetimepicker.min.js",
            paths.jqueryForm + "jquery.form.js"

        ], 'public/js/all.js', './')
        .styles([
           'public/css/bootstrap.css',
           paths.bootstrap + 'dist/css/bootstrap.min.css',
            paths.datetimepicker + "build/css/bootstrap-datetimepicker.css"
        ], 'public/css/all.css', 'public/css');


    mix.scripts([
            'default.js'

        ], 'public/js/app.js')
        .compass([
            'default.scss',
            // 'MDBootstrap/sass/mdb.scss',
            'home.scss',
            'review.scss',
            'history.scss',
            // 'smslayout_new.scss',
            // 'default_new.scss'
        ], 'public/css', {
            sass: 'resources/assets/sass',
            font: 'public/fonts',
            image: 'public/images',
            javascript: 'public/js',
        })
        .styles([
            'default.css',
            // 'MDBootstrap/sass/mdb.css',
            'home.css',
            'review.css',
            'history.css',
            // 'smslayout_new.css',
            // 'default_new.css'
        ], 'public/css/app.css', 'public/css')
        .browserSync({
            proxy: 'sms'
        })

});
