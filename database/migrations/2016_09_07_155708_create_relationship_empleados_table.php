<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {

            $table->foreign('tipo_empleado_id')
                ->references('id')->on('tipo_empleados')
                ->onDelete('cascade');

            $table->foreign('estado_civil_id')
                ->references('id')->on('estado_civiles')
                ->onDelete('cascade');

            $table->foreign('grado_instruccion_id')
                ->references('id')->on('grado_instrucciones')
                ->onDelete('cascade');

            $table->foreign('ocupacion_id')
                ->references('id')->on('ocupaciones')
                ->onDelete('cascade');

            $table->foreign('ubigeo_id')
                ->references('id')->on('ubigeos')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleados_tipo_empleado_id_foreign');
            $table->dropForeign('empleados_estado_civil_id_foreign');
            $table->dropForeign('empleados_grado_instruccion_id_foreign');
            $table->dropForeign('empleados_ocupacion_id_foreign');
            $table->dropForeign('empleados_ubigeo_id_foreign');
        });
    }
}
