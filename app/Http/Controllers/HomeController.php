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

class HomeController extends Controller
{
    public function index()
    {
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
        Post::query()->create($request->all());
        return redirect()->route('home');
    }
}

