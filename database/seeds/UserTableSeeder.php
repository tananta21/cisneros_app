<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(50);
        for ($i = 0; $i < 50; $i++) {
            User::create(array(
                'tipo_empleado_id' => $faker->numberBetween(1, 2),
                'estado_civil_id' => $faker->numberBetween(1, 2),
                'grado_instruccion_id' => $faker->numberBetween(1, 2),
                'ocupacion_id' => $faker->numberBetween(1, 2),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password

            ));
        }
    }
}
