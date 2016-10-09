<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->integer('tipo_comprobante_id')->unsigned();
            $table->integer('tipo_transaccion_id')->unsigned();
            $table->dateTime('fecha');
            $table->boolean('estado');

            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
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
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_proveedor_id_foreign');
            $table->dropForeign('compras_empleado_id_foreign');
            $table->dropForeign('compras_tipo_comprobante_id_foreign');
            $table->dropForeign('compras_tipo_transaccion_id_foreign');
        });

        Schema::drop('compras');
    }
}
