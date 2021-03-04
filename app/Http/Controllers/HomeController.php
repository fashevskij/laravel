<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


class HomeController extends Controller
{
    public function index()
    {
        //ТЕСТ КОНФИГУРАЦИЙ
        dump($_ENV);//вывод массива c переменными среды
        dump(env('DB_USERNAME'));//вывод массива c переменными среды
        dump($_ENV['DB_USERNAME']);//вывод конкретного поля настроей из массива по ключу
        dump(config('app.timezone'));//конфиг так же функция хелпер и получаем конфиги из конфигов
        //а так же возможность изменить их
        dump(config('database.connections.mysql.database'));
        return view('home', ['res' => '3', 'sum' => '5', 'name' => 'Anna']);//возврат представления home с передаными параметрамиp
    }

    public function test()
    {
        return __METHOD__;
    }
}
