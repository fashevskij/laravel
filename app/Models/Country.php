<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Country extends Model

{
    protected $table = "country";
//так как в этой таблице нет айди и ключа
    protected $primaryKey = 'Code';//указываем колонку в ручную которую будем использовать в качестве ключа
    public $incrementing = false;//говорим что это поле не автоинкрементируемое
    protected $keyType = 'string';//указываем тип нашего ключа что это строка
}
