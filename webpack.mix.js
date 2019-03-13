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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles('resources/assets/css/animate.min.css','public/css/animate.min.css')
	.styles('resources/assets/css/bootstrap.min.css','public/css/bootstrap.min.css')
	.styles('resources/assets/css/demo.css','public/css/demo.css')
	.styles('resources/assets/css/light-bootstrap-dashboard.css','public/css/light-bootstrap-dashboard.css')
	.styles('resources/assets/css/pe-icon-7-stroke.css','public/css/pe-icon-7-stroke.css');

// mix.js('resources/js/bootstrap-notify.js','public/js')
// 	.js('resources/js/bootstrap-select.js','public/js')
// 	.js('resources/js/bootstrap.min.js','public/js')
// 	.js('resources/js/chartist.min.js','public/js')
// 	.js('resources/js/demo.js','public/js')
// 	.js('resources/js/jquery.3.2.1.min.js','public/js')
// 	.js('resources/js/light-bootstrap-dashboard.js','public/js');

mix.copyDirectory('resources/assets/fonts','public/fonts')
	.copyDirectory('resources/assets/sass/','public/sass')
	.copyDirectory('resources/assets/img','public/assets/img')
	.copyDirectory('resources/js','public/js');