<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipMovimientos extends Migration
{

    public function up()
    {
        Schema::table('movimientos', function (Blueprint $table) {

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos')->onDelete('cascade');
            $table->foreign('concepto_movimiento_id')->references('id')->on('concepto_movimientos')->onDelete('cascade');
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');


        });
    }


    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropForeign('movimientos_empleado_id_foreign');
            $table->dropForeign('movimientos_tipo_pago_id_foreign');
            $table->dropForeign('movimientos_concepto_movimiento_id_foreign');
            $table->dropForeign('movimientos_serie_id_foreign');
        });
    }
}
