<?php

use Illuminate\Database\Seeder;
use App\Core\Marca\Marca;
use Faker\Factory as Faker;

class MarcaTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        Marca::create(array(
            'descripcion'=>'--------',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Marca::create(array(
            'descripcion'=>'Yamaha',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Marca::create(array(
            'descripcion'=>'zuzuki',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Marca::create(array(
            'descripcion'=>'taiwan',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Marca::create(array(
            'descripcion'=>'sfx',
            'estado' => $faker->numberBetween(0, 1)
        ));
        Marca::create(array(
            'descripcion'=>'honda',
            'estado' => $faker->numberBetween(0, 1)
        ));
    }
}
