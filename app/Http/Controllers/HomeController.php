<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller
class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['res' => '3', 'sum' => '5', 'name' => 'Anna']);//возврат представления home с передаными параметрамиp
    }

    public function test()
    {
        return __METHOD__;
    }
}
