<?php

use Illuminate\Database\Seeder;
use App\Core\Categoria\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(array(
            'descripcion'=>'--------'
        ));
        Categoria::create(array(
            'descripcion'=>'llantas'
        ));
        Categoria::create(array(
            'descripcion'=>'sistema electrico'
        ));

        Categoria::create(array(
            'descripcion'=>'motores'
        ));

    }
}
