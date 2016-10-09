<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipAmortizaciones extends Migration
{

    public function up()
    {
        Schema::table('amortizacion_pagos', function (Blueprint $table) {

            $table->foreign('cronograma_pago_id')
                ->references('id')->on('cronograma_pagos')
                ->onDelete('cascade');

        });
        Schema::table('amortizacion_cobros', function (Blueprint $table) {

            $table->foreign('cronograma_cobro_id')
                ->references('id')->on('cronograma_cobros')
                ->onDelete('cascade');

        });

    }


    public function down()
    {
        Schema::table('amortizacion_pagos', function (Blueprint $table) {
            $table->dropForeign('amortizacion_pagos_cronograma_pago_id_foreign');
        });

        Schema::table('amortizacion_cobros', function (Blueprint $table) {
            $table->dropForeign('amortizacion_cobros_cronograma_cobro_id_foreign');
        });

    }
}
