<?php

use Illuminate\Database\Seeder;

class TipoTransaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_transacciones')->insert([
            'descripcion' => 'contado',
            'estado' => 1,
        ]);

        \DB::table('tipo_transacciones')->insert([
            'descripcion' => 'credito',
            'estado' => 0,
        ]);
    }
}
