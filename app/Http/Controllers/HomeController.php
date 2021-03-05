<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //получение данных из базы через конструктор запросов
        //$data = DB::table('country')->get();

        //получение данных из базы с лимитом ограничения первые 5 стран
        //$data = DB::table('country')->limit(5)->get();

        //получение данных из базы определенных колонок 'Code','Name с лимитом 5 записей
        //$data = DB::table('country')->select('Code','Name')->limit(5)->get();

        //получаем первый елемент из базы данных выводим только 'Code','Name'
        //$data = DB::table('country')->select('Code','Name')->first();

        //ссортировка получаем последнюю запись из базы днных
        //orderBy('Code', 'desc') -ссортировка первый арг колонка , второй параметр ссортировки в данном случае с конца

        //получаем одну запись по id find - ищит по первичному ключу и получаем обьект с нужными параметрами так как первичный ключ может быть только 1
        //$data = DB::table('city')->select('Id','Name')->find('5');

        //Условия where получаем поле id , name где id = 5 и получаем многоменрый массив так как записей может быть много
        //$data = DB::table('city')->select('id','name')->where('id','=', 5)->get();

        //комбинация условий where в виде многомерного массива
        /*$data = DB::table('city')->select('id','name')->where([
            ['id','>','1'],['id','<','6']
        ])->get();*/

        //получаем из таблицы городов где ид < 5 получаем первое совпадение по условию выводим name
        //$data = DB::table('city')->where('id','<','5')->value('Name');

        //получаем из таблицы стран с лимитом 5 первые 5 стар 'name','code'
        //$data = DB::table('country')->limit('5')->pluck('name','code');


        /*Агригатные функции!!*/
        //получаем количество записей в таблице
        //$data = DB::table('country')->count();

        //получаем максимальное значение из таблицы country в поле population
        //$data = DB::table('country')->max('population');

        //получаем минимальное значение из таблицы country в поле population
        //$data = DB::table('country')->min('population');

        //получаем сумму всех цифр в колонке population
        //$data = DB::table('country')->sum('population');

        //получаем среднее значение всех цифр population
        //$data = DB::table('country')->avg('population');


        //distinct() - показывает только уникальные записи в выбраной колонке
        //$data=DB::table('city')->select('CountryCode')->distinct()->get();

        /*соеденение таблиц*/
        $data=DB::table('city')->select('city.ID','city.Name as city_name','country.Code', 'country.Name as country_name')->limit(10)
            ->join('country','city.CountryCode','=', 'country.Code')->orderBy('city.id')->get();
        dd($data);
    }
}

