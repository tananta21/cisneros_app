<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerActualizarstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        create TRIGGER actualizar_STOCK
            ON detalle_ventas
            FOR INSERT
            AS
            DECLARE @pro INT,@cantidad INT
            SELECT @pro=producto_id,@cantidad=cantidad FROM inserted
            UPDATE productos SET stock_actual =stock_actual - @cantidad
            WHERE producto_id=@pro
            GO
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
}
