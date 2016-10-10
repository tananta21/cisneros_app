<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Core\Cliente\Cliente;

class ClienteTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {

            Cliente::create(array(
                'tipo_cliente_id' => $faker->numberBetween(1, 2),
                'estado_civil_id' => $faker->numberBetween(1, 3),
                'grado_instruccion_id' => $faker->numberBetween(1, 4),
                'ocupacion_id' => $faker->numberBetween(1, 3),
                'nro_documento' => $faker->numberBetween(8),
                'nombres' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->email,
                'direccion' => $faker->address,
                'fecha_nacimiento' => $faker->dateTime
            ));
        }
    }
}
