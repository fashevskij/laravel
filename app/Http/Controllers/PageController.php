<?php

namespace App\Http\Controllers;


//создали класс PageController наследуемый от Controller
class PageController extends Controller
{
    public function show() {//создали метод класа

        $title = 'about page';
        return view("pages.about",compact('title'));
    }
}
