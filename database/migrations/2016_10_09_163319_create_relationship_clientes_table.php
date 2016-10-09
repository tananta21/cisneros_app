<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {

            $table->foreign('tipo_cliente_id')
                ->references('id')->on('tipo_clientes')
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

        });
    }


    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('clientes_tipo_cliente_id_foreign');
            $table->dropForeign('clientes_estado_civil_id_foreign');
            $table->dropForeign('clientes_grado_instruccion_id_foreign');
            $table->dropForeign('clientes_ocupacion_id_foreign');
//            $table->dropForeign('users_ubigeo_id_foreign');
        });
    }
}
