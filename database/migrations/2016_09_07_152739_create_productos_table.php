<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_producto_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->integer('modelo_id')->unsigned();
            $table->string('serie',30);
            $table->string('nombre',30);
            $table->decimal('precio');
            $table->decimal('stock_actual');
            $table->decimal('stock_minimo');
            $table->decimal('stock_maximo');
            $table->string('descripcion',30);
            $table->boolean('estado');
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
        Schema::drop('productos');
    }
}
