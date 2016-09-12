<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleStockProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_stock_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('almacen_id')->unsigned();
            $table->integer('unidad_medida_id')->unsigned();
            $table->decimal('precio');
            $table->decimal('stock_actual');
            $table->decimal('stock_minimo');
            $table->decimal('stock_maximo');
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
        Schema::drop('detalle_stock_productos');
    }
}
