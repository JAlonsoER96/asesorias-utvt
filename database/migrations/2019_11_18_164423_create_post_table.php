<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id_post');
            $table->string('titulo',25);
            $table->text('cuerpo_post');
            $table->string('archivo',200)->nullable();
            $table->datetime('fecha_post');
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('set null');
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
