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
            $table->string('nro_documento',8);
            $table->string('name',30);
            $table->string('apellidos',30);
            $table->string('email',50)->unique();
            $table->string('telefono',9);
            $table->string('password', 60);
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
