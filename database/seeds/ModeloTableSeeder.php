<?php

use Illuminate\Database\Seeder;
use App\Core\Modelo\Modelo;

class ModeloTableSeeder extends Seeder
{

    public function run()
    {
        Modelo::create(array(
            'marca_id'=>1,
            'categoria_id'=>1,
            'descripcion'=>'--------'
        ));
        Modelo::create(array(
            'marca_id'=>2,
            'categoria_id'=>1,
            'descripcion'=>'pistera'
        ));

        Modelo::create(array(
            'marca_id'=>2,
            'categoria_id'=>3,
            'descripcion'=>'cgl 110'
        ));
        Modelo::create(array(
            'marca_id'=>5,
            'categoria_id'=>2,
            'descripcion'=>'chacarera'
        ));

    }
}
