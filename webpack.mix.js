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

//обьеденяем несоклько файлов в один + минифицирование
mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css'
    ], 'public/css/styles.css');

// js в один + минифицирование
mix.scripts([
    'resources/front/js/bootstrap.js',

],'public/js/scripts.js');

//копируем изображения с папки в папку
mix.copyDirectory('resources/front/img','public/img')

//запуск микса npm run dev  - не минифицирует
// или npm run prod - минифицирует

//обновление страницы при изминениях в коде
mix.browserSync('localhost/laravel/public/');// + команда npm run watch

