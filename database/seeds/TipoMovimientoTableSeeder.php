<?php

use Illuminate\Database\Seeder;

class TipoMovimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_movimientos')->insert([
            'descripcion' => 'ingreso',
            'estado' => 1,
        ]);
        \DB::table('tipo_movimientos')->insert([
            'descripcion' => 'egreso',
            'estado' => 1,
        ]);
    }
}
