<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerieProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->string('serie');
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
        Schema::drop('serie_productos');
    }
}
