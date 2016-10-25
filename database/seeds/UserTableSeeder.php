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
                'tipo_empleado_id' =>$faker->numberBetween(1, 3),
                'estado_civil_id' => $faker->numberBetween(1, 4),
                'grado_instruccion_id' => $faker->numberBetween(1, 5),
                'ocupacion_id' => $faker->numberBetween(1, 4),
                'ubigeo_id'=>$faker->numberBetween(1, 2000),
                'nro_documento' => $faker->numberBetween(8),
                'name' => $faker->name,
                'apellidos' => $faker->lastName,
                'email' => $faker->email,
                'telefono' => $faker->phoneNumber,
                'nro_hijos'=> $faker->numberBetween(1, 10),
                'sueldo'=> $faker->numberBetween(800, 10000),
                'password' => Hash::make($faker->password),
                'sexo'=>$faker->numberBetween(0, 1),
                'estado' => $faker->numberBetween(0, 1),

            ));
        }

        User::create(array(
            'tipo_empleado_id'=>1,
            'estado_civil_id'=>1,
            'grado_instruccion_id'=>1,
            'ocupacion_id'=>1,
            'ubigeo_id'=>1975,
            'nro_documento'=>'72322246',
            'name'=>'kevin anthony',
            'apellidos'=>'tananta del aguila',
            'email'     => 'admin@admin.com',
            'telefono'=>'930652977',
            'password' => Hash::make('admin'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'estado'=>1
        ));
        User::create(array(
            'tipo_empleado_id'=>2,
            'estado_civil_id'=>1,
            'grado_instruccion_id'=>1,
            'ocupacion_id'=>1,
            'ubigeo_id'=>1975,
            'nro_documento'=>'77777777',
            'name'=>'Carlos Eduardo',
            'apellidos'=>'Morales Reategui',
            'email'     => 'vendedor@vendedor.com',
            'telefono'=>'930652976',
            'password' => Hash::make('vendedor'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'estado'=>1
        ));
        User::create(array(
            'tipo_empleado_id'=>3,
            'estado_civil_id'=>1,
            'grado_instruccion_id'=>1,
            'ocupacion_id'=>1,
            'ubigeo_id'=>1975,
            'nro_documento'=>'72222222',
            'name'=>'Marco Roberto',
            'apellidos'=>'Paredes Chistama',
            'email'     => 'cajero@cajero.com',
            'telefono'=>'930652978',
            'password' => Hash::make('cajero'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'estado'=>1
        ));

    }


}
