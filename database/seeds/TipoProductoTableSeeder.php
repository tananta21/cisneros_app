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
            'descripcion'=>'Productos'
        ));
        TipoProducto::create(array(
            'descripcion'=>'Servicios'
        ));
    }
}
