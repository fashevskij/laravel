<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChagePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title','100')->change();//изменяем поле тайтл задавая длину 100 символов
            $table->text('content')->nullable()->change();//изменяем поле контента по умолчанию нулл
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->change();//изменяем поле тайтл в случае отката для возвращение в исходное состояние
            $table->text('content')->nullable(false)->change();//изменяем поле контента в случае отката
        });
    }
}
