<?php

use Illuminate\Database\Seeder;

class TipoComprobanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_comprobantes')->insert([
            'descripcion' => 'boleta',
            'estado' => 1,
        ]);

        \DB::table('tipo_comprobantes')->insert([
            'descripcion' => 'factura',
            'estado' => 0,
        ]);

    }
}
