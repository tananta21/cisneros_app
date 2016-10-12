<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('ubigeo_id')->unsigned();
            $table->string('nro_documento',11);
            $table->string('nombre',50);
            $table->string('telefono',9);
            $table->string('encargado',50);
            $table->string('direccion',50);
            $table->string('correo',50);
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
        Schema::drop('proveedores');
    }
}