<?php

namespace App\Http\Controllers;


//создали класс PageController наследуемый от Controller
class PageController extends Controller
{
    public function show($slug) {//создали метод класа с взодным парраметром $slug
        //return view("pages.$slug");//возвращаем вид страницы в зависимостти от $slug
        return view("pages.show",['name_pages'=> $slug]);//возвращает одну страницу show с динамическим контентом
    }
}
