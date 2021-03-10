<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
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


        /**Агригатные функции!!*/
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

        /**соеденение таблиц
        $data=DB::table('city')->select('city.ID','city.Name as city_name','country.Code', 'country.Name as country_name')->limit(10)
            ->join('country','city.CountryCode','=', 'country.Code')->orderBy('city.id')->get();
        dd($data);*/
    /*
        //оздали обьект нашей модели пост
        $post = new Post();
        //заносим данные в базу данных
        $post->title = 'статья 1';
        //$post->content = 'контент статьи 1';
        $post->save();//сохраняем в бд*/


        /**работа с моделью */

        //$data = Country::query()->get();//получаем все записи через модель созданую для таблицы country
        //$data = Country::query()->limit(5)->get();
        //$data = City::query()->find('4');//выбор по айди в таблице
        //$data = Country::query()->find('AGO');
        //dd($data);

        /**Добавление в таблицу*/
        //первый вариант добавление
        /*$post = new Post();
        $post->title = 'статья 2';
        $post->content = 'контент статьи 2';
        $post->save();*/

        /**второй вариант добавления*/
        //Post::query()->create(['title'=>'пост 5', 'content'=>'контент поста 5']);

        //третий вариант добавления в базу данных (например когда данные прилетают из формы)
        /*
        $post = new Post();
        $post -> fill(['title'=>'пост 9', 'content'=>'контент поста 9']);
        $post -> save();*/

        /****Обновление данных в таблице***/
        //получаем запись
        /*$post = Post::query()->find('4');
        $post->update(['content'=>'anna']);
        $post->save();*/

        //меняем массово несколько записей
        //Post::query()->where('id','<','4')->update(['content'=>'test mass update']);

        //удаление данных
        /*$post = Post::query()->find('5');
        $post->delete();*/
        //или так удаляем 3 записи по айди
        //Post::destroy('4','2','1');

        /**работаем с связаными таблицами пост и рубрик
         эта связь 1 к 1 предпологает что только одно поле в таблице будет связано только
         * с одним полем в другой
         */
        //получаем все данные пост по id
       // $post = Post::query()->find('2');
       //дальше можно плучить все данные рубрики поста с id = 2
       //таким образом можно обращаться к одной таблице через другую через связаное поле rubric_id
        // данном примере через таблицу пост к таблице рубрик
       // dump($post->rubric->title);

        //и наоборот через таблицу рубрик могу получить данные таблицы пост
        //$rubric = Rubric::query()->find('3');
        ///dump($rubric->post->title);

        /**
        Эта свзять многие к одному или наоборот
         */

        //$rubric = Rubric::query()->find('2');
        //dump($rubric->posts);
        //$post = Post::query()->find('3');
        //dump($post->rubric->title);

        //короткая запись получаения постов!!!!!!!!
        //$posts = Rubric::query()->find('2')->posts;
        //dump($posts);

        /**Получение постов с помощью цикла*/

        //например получим тайтлы всех постов id который больше 1
        //with('rubric') - связываем сразу таблицу пост с виртуальным своиством рубрик (жадная загрузка!!
        //$posts = Post::query()->with('rubric')->where('id','>','1')->get();
        //с помощью цикла получаем каждый пост
        //foreach ($posts as $post) {
            //выводим тайтлы каждого полученгого поста,  так же выводим через связь тайтлый из таблицы рубрик привязаных к этим постам
           // dump($post->title, $post->rubric->title);
       // }

        /**Связь многие ко многим!!!*/
        //связываються 2 таблицы по средством третей
        //получаем пост с айди 1
        //$post = Post::query()->find('2');
        //выводим его
        //dump($post->title);
        //прогоняем циклом через виртуальное своийство в модели пост (tags)
        //foreach ($post->tags as $tag) {
            //выводим тайтлы тегов в таблицы тег связаные с постом через таблицу пост_таг
            //dump($tag->title);
        //}

        //аналогично для получения тегов
        //$tag = Tag::query()->find(2);
        //dump($tag->title);
        //foreach ($tag->posts as $post) {
            //dump($post->title);
        //}
    }
}

