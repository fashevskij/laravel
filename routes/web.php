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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/create',[HomeController::class, 'create'])->name('posts.create');
Route::post('/store',[HomeController::class, 'store'])->name('posts.store');

use App\Http\Controllers\PageController;
Route::get('/about',[PageController::class, 'show'])->name('page.about');

use App\Http\Controllers\ContactController;
//Route::get('/send', [ContactController::class, 'send']);

Route::match(['get','post'],'/send',[ContactController::class, 'send'])->name('send');

use \App\Http\Controllers\UserController;
//создаем группу маршрутов с одним посредником (гость - для него доступрны урл регистрации и авторизации)
Route::group(['middleware'=>'guest'] , function (){
    //маршруты для регистрации пользователя
    Route::get('/registration', [UserController::class,'registration'])->name('registration');
    Route::post('/registration', [UserController::class,'store'])->name('registration.store');

    //маршруты для авторизации пользователя
    Route::get('/login', [UserController::class,'loginForm'])->name('login.form');
    Route::post('/login', [UserController::class,'login'])->name('login.store');
});


//для авторизированого пользователя доступ к выходу через посредника
Route::get('/logout', [UserController::class,'logout'])->name('logout')->middleware('auth');

//middleware('admin') - выполняеться посредник при переходе на указаный маршрут
Route::group(['middleware' => 'admin'], function (){

    Route::get('/admin',[\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
});



//Route::fallback() перенаправление всех зпросов для которых нет правил на нужный мне
Route::fallback(function (){
    //return redirect()->route('home');//переправка всех несуществующих адресов на home(главную)
    //для создания свой ошибки например 404 создали вид в resources/views/errors/404.blade.php
    abort(404,'page not found.........');
    //для передачи текста ошибки в вид можно {{$exception->getMessage}}
    // $exception - хранит в себе все ошибки и метод getMessage позволляет получить текст ошибки
});

