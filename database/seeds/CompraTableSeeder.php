<?php

use Illuminate\Database\Seeder;
use App\Core\Compra\Compra;

class CompraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compra::create(array(
            'proveedor_id'=>1,
            'empleado_id'=>1,
            'tipo_comprobante_id'=>1,
            'tipo_transaccion_id'=>1,
            'estado'=> 1,
        ));
    }
}
