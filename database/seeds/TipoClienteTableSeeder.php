<?php

use Illuminate\Database\Seeder;

class TipoClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_clientes')->insert([
            'descripcion' => 'natural',
            'estado' => 1,
        ]);

        \DB::table('tipo_clientes')->insert([
            'descripcion' => 'juridico',
            'estado' => 1,
        ]);

    }
}
