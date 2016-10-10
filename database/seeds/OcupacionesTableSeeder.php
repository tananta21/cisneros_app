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
        \DB::table('ocupaciones')->insert([
            'descripcion' => 'abogado',
            'estado' => 1,
        ]);

        \DB::table('ocupaciones')->insert([
            'descripcion' => 'ingeniero',
            'estado' => 1,
        ]);


    }
}
