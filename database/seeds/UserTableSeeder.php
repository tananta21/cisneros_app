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
                'tipo_empleado_id' => 1,
                'estado_civil_id' => $faker->numberBetween(1, 3),
                'grado_instruccion_id' => $faker->numberBetween(1, 4),
                'ocupacion_id' => $faker->numberBetween(1, 3),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password)

            ));
        }

        User::create(array(
            'tipo_empleado_id'=>1,
            'estado_civil_id'=>1,
            'grado_instruccion_id'=>1,
            'ocupacion_id'=>1,
            'name'=>'kevin anthony',
            'email'     => 'admin@admin.com',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }


}
