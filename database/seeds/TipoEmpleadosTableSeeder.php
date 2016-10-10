<?php

use Illuminate\Database\Seeder;

class TipoEmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_empleados')->insert([
            'descripcion' => 'administrador',
            'estado' => 1,
        ]);
        \DB::table('tipo_empleados')->insert([
            'descripcion' => 'vendedor',
            'estado' => 1,
        ]);
        \DB::table('tipo_empleados')->insert([
            'descripcion' => 'limpiador',
            'estado' => 1,
        ]);
    }
}
