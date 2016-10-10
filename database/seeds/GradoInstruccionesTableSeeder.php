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
            'descripcion' => 'inicial',
            'estado' => 1,
        ]);
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'primaria',
            'estado' => 1,
        ]);
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'secundaria',
            'estado' => 1,
        ]);
        \DB::table('grado_instrucciones')->insert([
            'descripcion' => 'pregrado',
            'estado' => 1,
        ]);



    }
}
