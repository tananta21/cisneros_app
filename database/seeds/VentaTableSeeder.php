<?php

use Illuminate\Database\Seeder;
use App\Core\Venta\Venta;

class VentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venta::create(array(
            'cliente_id'=>1,
            'empleado_id'=>1,
            'tipo_comprobante_id'=>1,
            'tipo_transaccion_id'=>1,
            'estado'=> 1,
        ));
    }
}
