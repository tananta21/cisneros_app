<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->integer('compra_id')->unsigned();
            $table->decimal('precio');
            $table->decimal('cantidad');
            $table->decimal('igv');
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
        Schema::drop('detalle_compras');
    }
}