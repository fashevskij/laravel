<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    /*  //для связывания этой модели и таблицы
    protected $table = 'posts';
        //должно быть поле с ключем и оно должно быть целочисленным чтобы связать его с моделью можно указать
    protected $primaryKey = 'post_id';

    //для того если в таблице нет уникальный айди или первичного ключа с автозаполнением
    public $incrementing = false;//мы указываем что сами автозаполнени false
    protected $keyType = 'string';//если поле не чиловое указывем его тип

    //если мы не хотим чтобы время created_at и updated_at не заполнялось автоматически
    public $timestamps= false;*/

    //таким образмо можно поместить данные в таблицу posts  чере эту модель с помощью protected  $attributes = []
        //protected  $attributes = ['content'=>'hello anna'];
        //другими словами это значение по умолчанию когда я пытаюсь внести в таблицу поле контент оставляя его пустым занесеться эта запись

    /***$fillable - атрибуты которые могут быть присвоены массово перечисляем в виде массива****/
   // protected $fillable = ['title','content'];

    /**Связываем таблицу пост с таблицей рубрик*/
    //данная запись работает как 1к1 и 1 к многим

    protected  $fillable = ['title','content','rubric_id'];




    public function rubric() {
        return $this->belongsTo(Rubric::class);
    }


    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function  getPostDate() {
       return Carbon::parse($this->created_at)->diffForHumans();
    }
}
