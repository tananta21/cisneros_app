<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_cliente_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->integer('grado_instruccion_id')->unsigned();
            $table->integer('ocupacion_id')->unsigned();
            $table->string('nro_documento',30);
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('direccion');
            $table->date('fecha_nacimiento');
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
        Schema::drop('clientes');
    }
}
