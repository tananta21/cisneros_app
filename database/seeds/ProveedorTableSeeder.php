<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Core\Proveedor\Proveedor;

class ProveedorTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Proveedor::create(array(
                'ubigeo_id'=>$faker->numberBetween(1, 2000),
                'nro_documento' => $faker->numberBetween(8),
                'nombre' => $faker->firstName,
                'telefono' => $faker->phoneNumber,
                'encargado' => $faker->firstName,
                'direccion' => $faker->address,
                'correo' => $faker->email,
                'estado' => $faker->numberBetween(0, 1)

            ));
        }
    }
}
