<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    //создаем виртуальное своиство для таблицы руббрик чтобы сзязаться с табл постс
   public function posts() {
       /**связываем таблицу рубрик с таблицей пост*/

       // метод 1 к 1
      // return $this->hasOne(Post::class);

       //метод 1 к многим
       return $this->hasMany(Post::class);

   }
}
