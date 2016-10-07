<?php

use Illuminate\Database\Seeder;
use App\Core\Modelo\Modelo;
use Faker\Factory as Faker;

class ModeloTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Modelo::create(array(
            'descripcion'=>'--------',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Modelo::create(array(
            'descripcion'=>'pistera',
            'estado' => $faker->numberBetween(0, 1)
        ));

        Modelo::create(array(
            'descripcion'=>'cgl 110',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Modelo::create(array(
            'descripcion'=>'chacarera',
            'estado' => $faker->numberBetween(0, 1)
        ));

    }
}
