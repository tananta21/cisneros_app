<?php

use App\Core\Cliente\Cliente;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ClienteTableSeeder extends Seeder
{
    public function run()
{
    $faker = Faker::create();
    for ($i = 0; $i < 50; $i++) {
        Cliente::create(array(
            'tipo_cliente_id' => $faker->numberBetween(1, 3),
            'estado_civil_id' => $faker->numberBetween(1, 3),
            'grado_instruccion_id' => $faker->numberBetween(1, 3),
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

