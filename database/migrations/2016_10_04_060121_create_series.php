<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_comprobante_id')->unsigned();
            $table->foreign('tipo_comprobante_id')->references('id')->on('tipo_comprobantes')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->integer('correlativo');
            $table->integer('max_correlativo');
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
        Schema::table('series', function (Blueprint $table) {
            $table->dropForeign('series_tipo_comprobante_id_foreign');
        });
        Schema::drop('series');
    }
}
