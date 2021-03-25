<?php

namespace App\Providers;

use App\Models\Rubric;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //для просмотра запросов (что его формирует)
       DB::listen(function ($query){
         // dump($query->sql);
       });

       //регистрация view composer ()
        //Rubric::all() - все рубрики под именем rubrics будут доступны для шаблона layouts.footer
        view()->composer('layouts.footer', function ($view){
           $view->with('rubrics', Rubric::all());
        });
    }
}
