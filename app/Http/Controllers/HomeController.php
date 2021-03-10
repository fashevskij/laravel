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
        $data1 = range(1,22);
        $data2 = ['title'=>'TITLE',
            'content'=>'CONTENT',
            'keys'=>'KEYS'];
        $title = 'home page';
        $h1 = "home";
       return view('home',compact('title','h1','data1','data2'));
    }
}

