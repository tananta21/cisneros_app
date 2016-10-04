<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptoMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto_movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_movimiento_id')->unsigned();
            $table->string('descripcion');
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
        Schema::drop('concepto_movimientos');
    }
}
