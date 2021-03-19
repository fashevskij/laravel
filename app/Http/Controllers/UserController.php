<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration() {
        $title = 'registration';
        return view('user.registration',compact('title'));
    }

    public function store(Request $request)
    {

            //dd($request->all());//проверяем что передали в форме
        $request->validate([//массив валидационных правил для формы
            'name'=>'required',
            'email'=> ['required','email','unique:users,email'],
            'password'=>['required','confirmed'],
            'avatar' => ['nullable','image']
        ]);
        if ($request->hasFile('avatar')){
            $folder = date('Y-m-d');//переменная будет равна дате сегодня
        //для сохранения загруженой картинки используем file('название поля')->store('куда сохран)
        $avatar = $request->file('avatar')->store("images/{$folder}");
    }



        //Создаем запрос к базе данных на внесение юзера
       $user = User::query()->create([
           'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),//хешируем пароль перед внесением
           'avatar' => $avatar ?? null//передаем путь к картинке в базу данных или null если ее нет
       ]);
       //выводим флеш сообщение после регистрации
       session()->flash('flashText','Пользователь успешено зарегестрирован');
       //выполняем вход на сайт после регистрации
       Auth::login($user);
       //перенаправляем на главную страницу
       return redirect()->home();


    }

    public function loginForm() {
        $title = 'login';
        return view('user.login', compact('title'));//возврашаем вид формы авторизации
    }

    public function login(Request $request) {
        //массив валидационных правил для формы логина
        $request->validate([
            'email'=> ['required','email'],
            'password'=>['required'],

        ]);


        //если прошли валидацию
        //проверяем наличие введенного логина и пароля в бд
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password, ])) {
          return redirect()->home();  //если все ок то переходим на главную
        }else{//если нет
            //переходим на страницу входа и выводим сообщение
            return redirect()->route('login.form')->with('error','не правельный логин или пароль');
        }
    }

    public function logout() {
        Auth::logout();//выход авторизованного пользователя
        return redirect()->route('login.form');//переходим на страницу входа
    }

}
