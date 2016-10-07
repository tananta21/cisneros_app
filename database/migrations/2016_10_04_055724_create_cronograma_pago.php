<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograma_pago', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compras_id')->unsigned();
            $table->dateTime('fecha');
            $table->decimal('cuota');
            $table->decimal('monto');
            $table->decimal('pagado');
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
        Schema::drop('cronograma_pago');
    }
}