<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modelos', function (Blueprint $table) {

            $table->foreign('marca_id')
                ->references('id')->on('marcas')
                ->onDelete('cascade');

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade');

    });
    }

    public function down()
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->dropForeign('modelos_marca_id_foreign');
            $table->dropForeign('modelos_categoria_id_foreign');
        });
    }
}
