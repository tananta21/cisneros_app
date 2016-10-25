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
            'descripcion' => 'Administrador',
            'estado' => 1,
        ]);
        \DB::table('tipo_empleados')->insert([
            'descripcion' => 'Vendedor',
            'estado' => 1,
        ]);
        \DB::table('tipo_empleados')->insert([
            'descripcion' => 'Cajero',
            'estado' => 1,
        ]);

    }
}
