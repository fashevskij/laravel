<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function (){
    return "<h1>Hello</h1>";
});*/

Route::get('/',function (){
    $res = 1+2;
    $name="anna";
    //view - вид коотрый должен находиться по адресу resources/views
    // передача переменных $res,$name на страницу home и ее обьвление в роуте
    //return view('home', ['res'=>$res, 'name'=>$name]);
    return view('home', compact('res','name'));
});

//по адресу about выводими все что в h1
Route::get('/about',function (){
   return '<h1>about page</h1>';
});
