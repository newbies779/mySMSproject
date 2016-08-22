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
    'jquery': './bower_components/jquery/',
    'bootstrap': './bower_components/bootstrap/',
    'tether': './bower_components/tether/',
    'assets': './resources/assets/',
    'moment': './bower_components/moment/',
    'datetimepicker': './bower_components/eonasdan-bootstrap-datetimepicker/',
    'jqueryForm': './bower_components/jquery-form/',
    'js': './resources/assets/js/',
    'drop':'./bower_components/tether-drop/'
}

elixir(function(mix) {
    mix.sass("bootstrap.scss", 'public/css/', { includePaths: [paths.bootstrap + 'scss/'] })
        .scripts([
            paths.jquery + "dist/jquery.min.js",
            paths.tether + "dist/js/tether.min.js",
            paths.bootstrap + "dist/js/bootstrap.min.js",
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
            'default.js',
            paths.drop + "dist/js/drop.js"
        ], 'public/js/app.js')
        .compass([
            'default.scss',
            'home.scss'

        ], 'public/css', {
            sass: 'resources/assets/sass',
            font: 'public/fonts',
            image: 'public/images',
            javascript: 'public/js',
        })
        .styles([
            'default.css',
            'home.css'

        ], 'public/css/app.css', 'public/css');
    
});
