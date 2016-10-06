<?php

use Illuminate\Database\Seeder;

class OcupacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ocupaciones')->insert([
            'descripcion' => 'mecanico',
            'estado' => 1,
        ]);
    }
}
