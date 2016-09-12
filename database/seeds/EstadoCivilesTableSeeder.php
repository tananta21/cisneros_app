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
        ]);
    }
}
