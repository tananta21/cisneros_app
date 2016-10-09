<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmortizacionDeCobro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amortizacion_cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cronograma_cobro_id')->unsigned();
            $table->decimal('monto');
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
        Schema::drop('amortizacion_cobros');
    }
}
