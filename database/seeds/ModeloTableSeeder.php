<?php

use Illuminate\Database\Seeder;
use App\Core\Modelo\Modelo;

class ModeloTableSeeder extends Seeder
{

    public function run()
    {
        Modelo::create(array(
            'descripcion'=>'--------'
        ));
        Modelo::create(array(
            'descripcion'=>'pistera'
        ));

        Modelo::create(array(
            'descripcion'=>'cgl 110'
        ));
        Modelo::create(array(
            'descripcion'=>'chacarera'
        ));

    }
}
