<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipDetalleStockProductosTable extends Migration
{
    public function up()
    {
        Schema::table('detalle_stock_productos', function (Blueprint $table) {

            $table->foreign('producto_id')
                ->references('id')->on('productos')
                ->onDelete('cascade');

            $table->foreign('almacen_id')
                ->references('id')->on('almacenes')
                ->onDelete('cascade');

            $table->foreign('unidad_medida_id')
                ->references('id')->on('unidad_medidas')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('detalle_stock_productos', function (Blueprint $table) {
            $table->dropForeign('detalle_stock_productos_producto_id_foreign');
            $table->dropForeign('detalle_stock_productos_almacen_id_foreign');
            $table->dropForeign('detalle_stock_productos_unidad_medida_id_foreign');
        });
    }
}
