<?php

use Illuminate\Database\Seeder;
use App\Core\Marca\Marca;

class MarcaTableSeeder extends Seeder
{
    public function run()
    {
        Marca::create(array(
            'descripcion'=>'--------'
        ));
        Marca::create(array(
            'descripcion'=>'Yamaha'
        ));
        Marca::create(array(
            'descripcion'=>'zuzuki'
        ));
        Marca::create(array(
            'descripcion'=>'taiwan'
        ));
        Marca::create(array(
            'descripcion'=>'sfx'
        ));
        Marca::create(array(
            'descripcion'=>'honda'
        ));
    }
}
