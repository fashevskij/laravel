<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {

   /*   ****СЕССИИ*****
     //запись в сессию ключ значение
        session()->put('test','test text');
        session(['card'=>[
        ['id'=>'1','title'=>'prod 1'],
        ['id'=>'2','title'=>'prod 2']
    ]]);
        //обращаемся к сесси и выводим значение
        dump(session('test'));
        dump(session('card')[1]['title']);


        //добавляем в массив кард в сессию новый продукт
        //$request->session()->push('card',['id'=>'3','title'=>'prod 3']);

        //удаление данных из сесии
        //dump(session()->pull('test'));//вырезал , распечатал удалил
        //$request->session()->forget('test');//удаление из сесии

        //полная очистка сессии
        //$request->session()->flush();
        */

        dump(session()->all());

        $posts = Post::query()->orderBy('id','desc')->get();//получаем посты в обратном порядке
        $title = 'home page';
       return view('home',compact('title','posts'));
    }

    public function create() {
        $title = 'create post';
        $rubrics = Rubric::query()->pluck('title','id')->all();
        return view('create',compact('title','rubrics'));
    }

    public function store(Request $request) {
        /*dump($request->input('title'));
        dump($request->input('content'));
        dump($request->input('rubric_id'));*/
        //dd($request->all());

        $this->validate($request,
            [
                'title' => ['required','min:5','max:25'],
                'content'=> 'required',
                'rubric_id'=> 'integer',

            ]);

        /*
        $rules = [
            'title' => ['required','min:5','max:25'],
            'content'=> 'required',
            'rubric_id'=> 'integer',
        ];

        $messages = [
            'title.required' => 'заполните поле тайтла',
            'title.min' => 'минимум 5 символов',
            'title.max' => 'максимум 100 сиволов',

            'rubric_id.integer' => 'выбирите рубрику',
            'content.required'=> 'поле не должно быть пустым',

        ];

        $validator = Validator::make($request->all(),$rules, $messages)->validate();*/

        //флеш сообщения в сессии которые показываютсья только один раз
        session()->flash('flash text','данные сохранены!');

        Post::query()->create($request->all());
        return redirect()->route('home');
    }
}

