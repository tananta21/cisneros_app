<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipDetalleCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->dropForeign('detalle_compras_compra_id_foreign');
            $table->dropForeign('detalle_compras_producto_id_foreign');
        });
    }
}
