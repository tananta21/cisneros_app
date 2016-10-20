<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipAccesosTable extends Migration
{

    public function up()
    {
        Schema::table('accesos', function (Blueprint $table) {

            $table->foreign('modulo_id')
                ->references('id')->on('modulos')
                ->onDelete('cascade');

            $table->foreign('tipo_empleado_id')
                ->references('id')->on('tipo_empleados')
                ->onDelete('cascade');

        });

    }

    public function down()
    {
        Schema::table('accesos', function (Blueprint $table) {
            $table->dropForeign('accesos_modulo_id_foreign');
            $table->dropForeign('accesos_tipo_empleado_id_foreign');
        });
    }
}
