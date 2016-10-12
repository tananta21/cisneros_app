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
            $table->string('descripcion',30);
            $table->foreign('tipo_movimiento_id')->references('id')->on('tipo_movimientos')->onDelete('cascade');
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
        Schema::table('concepto_movimientos', function (Blueprint $table) {
            $table->dropForeign('concepto_movimientos_tipo_movimiento_id_foreign');
        });

        Schema::drop('concepto_movimientos');
    }
}
