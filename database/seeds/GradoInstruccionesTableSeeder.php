<?php

use Illuminate\Database\Seeder;

class GradoInstruccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'mecanico',
            'estado' => 1,
        ]);
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'ingeniero',
            'estado' => 1,
        ]);
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'tecnico',
            'estado' => 1,
        ]);
    }
}
