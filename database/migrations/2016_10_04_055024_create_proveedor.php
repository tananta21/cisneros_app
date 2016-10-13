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
            $table->integer('ubigeo_id')->unsigned();
            $table->string('nro_documento',14);
            $table->string('nombre',50);
            $table->string('telefono',20);
            $table->string('encargado',50);
            $table->string('direccion',60);
            $table->string('web',60);
            $table->string('correo',60);
            $table->string('descripcion',100);
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