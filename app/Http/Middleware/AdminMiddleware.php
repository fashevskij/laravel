<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**посредник для доступа к админу через строку гет
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        //если пользователь авторизован и его поле is_admin =1 ,
        if (Auth::check() && Auth::user()->is_admin == 1) {
            //тогда пропускаем запрос дальше
            return $next($request);
        }
        //иначе ошибка 404 для остальных пользователей
       abort(404, 'страница не найдена');
    }
}
