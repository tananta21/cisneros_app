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
            $table->integer('ubigeo_id')->unsigned();
            $table->string('nro_documento',11);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('telefono',20);
            $table->string('correo',50)->unique();
            $table->string('direccion',60);
            $table->string('nro_hijos',2);
            $table->string('sueldo',5);
            $table->date('fecha_nacimiento');
            $table->boolean('sexo');
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
