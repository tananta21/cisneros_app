<?php

use App\Core\Categoria\Categoria;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriaTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Categoria::create(array(
            'descripcion' => '--------',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Categoria::create(array(
            'descripcion' => 'llantas',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Categoria::create(array(
            'descripcion' => 'sistema electrico',
            'estado' => $faker->numberBetween(0, 1)
        ));

        Categoria::create(array(
            'descripcion' => 'motores',
            'estado' => $faker->numberBetween(0, 1)
        ));

    }
}
