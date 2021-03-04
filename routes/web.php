<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ------------Web Routes less 1 ROUTES!!!!!!!!!!!!!!!!!!!
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//для подключение контроллеров!!
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);// в роуте указывам метод/урл/[имя класса, и его метод]


use App\Http\Controllers\PageController;
Route::get('/page/{slug}', [PageController::class, 'show']);

use App\Http\Controllers\Test\TestController;
Route::get('/show_test',[TestController::class, 'showTest']);

use App\Http\Controllers\PostController;
//
Route::resource('/posts', PostController::class)->parameters([
    'posts' => 'id'
]);







//Route::fallback() перенаправление всех зпросов для которых нет правил на нужный мне
Route::fallback(function (){
    //return redirect()->route('home');//переправка всех несуществующих адресов на home(главную)
    //для создания свой ошибки например 404 создали вид в resources/views/errors/404.blade.php
    abort(404,'page not found.........');
    //для передачи текста ошибки в вид можно {{$exception->getMessage}}
    // $exception - хранит в себе все ошибки и метод getMessage позволляет получить текст ошибки
});

