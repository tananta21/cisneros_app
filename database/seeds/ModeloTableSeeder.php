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
            'marca_id' => $faker->numberBetween(1, 6),
            'descripcion'=>'--------',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Modelo::create(array(
            'marca_id' => $faker->numberBetween(1, 6),
            'descripcion'=>'pistera',
            'estado' => $faker->numberBetween(0, 1)
        ));

        Modelo::create(array(
            'marca_id' => $faker->numberBetween(1, 6),
            'descripcion'=>'cgl 110',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Modelo::create(array(
            'marca_id' => $faker->numberBetween(1, 6),
            'descripcion'=>'chacarera',
            'estado' => $faker->numberBetween(0, 1)
        ));

    }
}
