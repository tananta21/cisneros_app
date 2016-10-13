<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_empleado_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->integer('grado_instruccion_id')->unsigned();
            $table->integer('ocupacion_id')->unsigned();
            $table->integer('ubigeo_id')->unsigned();
            $table->string('nro_documento',11);
            $table->string('name',50);
            $table->string('apellidos',50);
            $table->string('email',50)->unique();
            $table->string('telefono',20);
            $table->string('password');
            $table->string('nro_hijos',2);
            $table->string('sueldo',5);
            $table->date('fecha_nacimiento');
            $table->boolean('sexo');
            $table->boolean('estado');
            $table->rememberToken();
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
        Schema::drop('empleados');
    }
}
