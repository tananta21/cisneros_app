<?php

use Illuminate\Database\Seeder;
use App\Core\TipoProducto\TipoProducto;

class TipoProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProducto::create(array(
            'descripcion'=>'Producto',
            'estado'=>1
        ));
        TipoProducto::create(array(
            'descripcion'=>'Servicio',
            'estado'=>1
        ));
    }
}
