<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        /**работа с cookie*/
        //Cookie::queue('test-cook','hello ann', 5);//создаем куку
        //Cookie::queue(Cookie::forget('test-cook'));//удаление куки
        //dump(Cookie::get('test-cook'));//выводдим куку
        //dump($request->cookie('test-cook'));//или так выводим

        /**Работа с Кешем*/
        //помещение в кеш
        //Cache::put('key','value1',60);//положили в кеш по ключу валуе на 60сек
        //Cache::put('key','value1')//тоже самое только навсегда положено в кеш
        //dump(Cache::get('key'));//выводим валуе по ключу
        //Cache::forget('posts');//удаляем кеш
        //Cache::pull('posts');//получаем данные и сразу удалим после получения
        //Cache::flush();/удаление всех данных в кеше
        //провека есть ли что то в  кеше



            $title = 'home page';
            //выполняем запрос к базе данных и получаем все посты в обратном порядке c количеством постов на странице 3
            //paginate('3') сколько постов мы покажем на странице
            //orderBy('что ссортируем', 'desc-(в обратном порядке)')
            $posts = Post::query()->orderBy('created_at', 'desc')->paginate('6');
            //возвращаем вид хом, и передаем туда тайтл и посты
            return view('home',compact('title','posts'));
    }

        public function create() {
            $title = 'create post';
            $rubrics = Rubric::query()->pluck('title','id')->all();
            return view('create',compact('title','rubrics'));
        }

    public function store(Request $request) {


        $this->validate($request,
            [
                'title' => ['required','min:5','max:25'],
                'content'=> 'required',
                'rubric_id'=> 'integer',

            ]);


        //флеш сообщения в сессии которые показываютсья только один раз
        session()->flash('flash text','данные сохранены!');

        Post::query()->create($request->all());
        return redirect()->route('home');
    }
}

