<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request) {

        $title = 'messages';
        //если метод пост
        if ($request->method() == 'POST'){
            //создаем сообщение
            $body = "<p><b>Имя:</b> {$request->input('name')}</p>";
            $body .= "<p><b>Емейл:</b> {$request->input('email')}</p>";
            $body .= "<p><b>Текст:</b> <br>" . nl2br($request->input('text')) ."</p>";
            //используем фасад мейл to (куда)-> send (создаем шаблон TestMail())
            Mail::to('fashevskij@gmail.com')->send(new TestMail($body));
            $request->session()->flash('flashText','Сообщение отправлено');
            return redirect('/send');
        }

        return view('send',compact('title'));
    }
}
