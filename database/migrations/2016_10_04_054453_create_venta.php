<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('tipo_comprobante_id')->unsigned();
            $table->integer('tipo_transaccion_id')->unsigned();
            $table->dateTime('fecha');
            $table->boolean('estado');

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('tipo_comprobante_id')->references('id')->on('tipo_comprobantes')->onDelete('cascade');
            $table->foreign('tipo_transaccion_id')->references('id')->on('tipo_transacciones')->onDelete('cascade');
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
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('ventas_cliente_id_foreign');
            $table->dropForeign('ventas_empleado_id_foreign');
            $table->dropForeign('ventas_tipo_comprobante_id_foreign');
            $table->dropForeign('ventas_tipo_transaccion_id_foreign');
        });

        Schema::drop('ventas');
    }
}