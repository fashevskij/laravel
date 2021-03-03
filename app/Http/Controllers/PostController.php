<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //для получаения пути перехода
    //внедряемая зависимость передаеться первая
    //Request - в нем храниться вся информация о странице
    public function __construct(Request $request)
    {
        //dump($request);
        dump($request->route()->getName());//для получения названия маршрута
    }
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "post $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($id);
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  int  $id
     * return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
