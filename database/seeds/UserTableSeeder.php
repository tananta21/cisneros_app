<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
