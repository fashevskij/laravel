<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');//создаем поле с иминем id с ключем
            $table->string('title');//создали поле с именем title
            $table->text('content');//создаем поле с именем content
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * при откате
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
