<?php

namespace App\Http\Controllers;

//Создаем новый контроллер HomeController наследуемый от Controller


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {   //добавление в базу данны
       /* $query = DB::insert("INSERT INTO posts (title, content)
            VALUES (:title, :content)", ['title'=>'Blog 3', 'content'=>'Blog content 3']);
        var_dump($query);

        //обновление базы данны вывод количество обновлений
        dump( DB::update("UPDATE posts SET title = :title WHERE title = 'Blogs 5' ", ['title'=>'blogs 3']));
        */
        //удаление с базы данных где айди равно 4
       /*DB::delete("DELETE FROM posts WHERE id=?",[4]);*/

        //отлов ошибок
        DB::beginTransaction();//запускаем метод транзкции
        try {
            DB::update("UPDATE posts SET created_at = ? WHERE created_at = NULL ", [NOW()]);
            DB::update("UPDATE posts SET updated_at = ? WHERE updated_at = NULL ", [NOW()]);
            DB::commit();//выполняем запрос если все обновления выше прошли успешно
        }catch (\Exception $e){
            //если не прошло успешно
            DB::rollBack();//откатываем назад изменения
            echo $e->getMessage();//выводим ошибку
        }





       //вывод данных из базы
        $posts = DB::select("SELECT * FROM posts WHERE id > :id", ['id'=> 3]);
        return $posts;

    }
}

