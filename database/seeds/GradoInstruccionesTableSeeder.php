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
    }
}
