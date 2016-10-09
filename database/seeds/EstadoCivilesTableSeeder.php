<?php

use Illuminate\Database\Seeder;

class EstadoCivilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estado_civiles')->insert([
            'descripcion' => 'soltero',
            'estado' => 1,
        ]);
        \DB::table('estado_civil')->insert([
            'descripcion' => 'casado',
            'estado' => 1,
        ]);
        \DB::table('estado_civil')->insert([
            'descripcion' => 'viudo',
          'estado' => 1,
        ]);
    }
}
