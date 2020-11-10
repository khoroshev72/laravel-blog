const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/assets/admin/css/adminlte.min.css',
    'resources/assets/admin/plugins/select2/select2.min.css',
    'resources/assets/admin/plugins/select2/select2-bootstrap4.min.css'
    ], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/select2.full.min.js',
    'resources/assets/admin/js/adminlte.js',
    'resources/assets/admin/js/demo.js',
    'resources/assets/admin/js/scripts.js'
],'public/assets/admin/js/admin.js');

mix.styles([
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/single.css',
    'resources/assets/front/css/style.css',
    'resources/assets/front/css/fontawesome-all.css'
], 'public/assets/front/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery-2.2.3.min.js',
    'resources/assets/front/js/move-top.js',
    'resources/assets/front/js/easing.js',
    'resources/assets/front/js/bootstrap.js',
    'resources/assets/front/js/scripts.js',
], 'public/assets/front/js/front.js');

mix.copy('resources/assets/admin/css/adminlte.min.css.map', 'public/assets/admin/css');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');
mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/front/img', 'public/assets/front/img');
mix.copyDirectory('resources/assets/front/webfonts', 'public/assets/front/webfonts');
