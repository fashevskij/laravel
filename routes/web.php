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
})->name('home');

//по адресу about выводими все что в h1
Route::get('/about',function (){
   return '<h1>about page</h1>';
});



/*
Route::get('contact', function (){
    return view('contact');
});
//отправка формы на страницу end-email
Route::post('/send-email',function (){
    if (!empty($_POST)){//если пост не пустой
        dump($_POST);
    }
    return 'send email';
});

//отправка формы на страницу contact
Route::match(['post','get'], '/contact', function (){//match принимает несколько методов в виде массива
    if (!empty($_POST)){//если пост не пустой
        dump($_POST);
    }
    return view('contact');//возвращаем отображение страницы контакт
});*/

//отправка формы на страницу contact с несколькими запросами на оодну страницу
Route::match(['post','get','PUT'], '/contact', function (){//match принимает несколько методов в виде массива
    if (!empty($_POST)){//если пост не пустой
        dump($_POST);
    }
    return view('contact');//возвращаем отображение страницы контакт
})->name('contacts');//name - именнованый маршрукт при указании на него независимо от значения url будет переход

//для статический страниц можно использовать сокращение для роутинга url/views/data[];
Route::view('/test','test',['test_text'=>'test']);
//redirect - перенаправление откуда/куда
Route::redirect('test', 'contact');//в данном примере с test на  contact по умолчанию стоит 302 и обе страницы существуют
Route::redirect('test', 'contact', 301);//301 значит страница перемещена на всегда для СЕО test не существует только контакт

//роутинг для передачи динамического контента в виде  id
//{id} - имя может состоять из [0-9a-z_]
/*
Route::get('/post/{id}',function ($id){
    return "post $id";
});

Route::get('/post/{id}/{slug}',function ($id,$slug){
    return "post $id | $slug";
})->where(['id'=>'[0-9]+','slug'=>'[0-9a-zA-Z-]+']);//регулярное выражение для id,slug
//('id','[0-9]+');//регулярное выражение для толкьо для одного id (в id могут быть только цифры могут быть)
*/

//можно указать паттерны(регулярки) глобально для id,slug в app/providers/RouteServiceProvider.php
Route::get('/post/{id?}/{slug?}',function ($id = null,$slug = null){
    //{id?}/{slug?} знак вопроса говорит о том что этот параметр не обязателен $id = null,$slug = null но нужно поставить значения по умолчанию
    return "post $id | $slug";
})->name('posts');


//групировка правил
//prefix добавляет в данном случае admin перед обращением к роутам ниже
//group - групировка роутов
//name -имя для группы

Route::prefix('admin')->name('admin.')->group(function (){
    //теперь все доступно по адресам admin/posts/....
    Route::get('/posts', function (){
        return 'Post list';
    });

    Route::get('/posts/create', function (){
        return 'Post create';
    });

    Route::get('/posts/{id}/edit', function ($id){
        return "edit post $id";
    })->name('posts');
});


//Route::fallback() перенаправление всех зпросов для которых нет правил на нужный мне
Route::fallback(function (){
    //return redirect()->route('home');//переправка всех несуществующих адресов на home(главную)
    //для создания свой ошибки например 404 создали вид в resources/views/errors/404.blade.php
    abort(404,'page not found.........');
    //для передачи текста ошибки в вид можно {{$exception->getMessage}}
    // $exception - хранит в себе все ошибки и метод getMessage позволляет получить текст ошибки
});

//подмена метода передачи данных

/*
 * По правилу машрутизации код остановиться на первом совпадении,а значит четкие правила должны быть выше по коду
 * пример: /posts/{id}/edit четкое правило и его может перебить /post/{id?}/{slug?} это с необязательными параметрами
 *
 * имена для маршрутов должны быть уникальны иначе последнее перезапишет преддыдущее
 * */
