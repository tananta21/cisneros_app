<?php

use Illuminate\Database\Seeder;
use App\Core\Producto\Producto;
use Faker\Factory as Faker;

class ProductoTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $name = $faker->name;
            Producto::create(array(
                'marca_id' => $faker->numberBetween(1, 6),
                'categoria_id' => $faker->numberBetween(1, 4),
                'modelo_id' => $faker->numberBetween(1, 4),
                'tipo_producto_id' => $faker->numberBetween(1, 2),
                'modelo_id' => $faker->numberBetween(1, 4),
                'serie' => $faker->ean8,
                'nombre' => $name,
                'descripcion' => $faker->text,
                'estado' => $faker->numberBetween(1, 2)
//                'precio'=>$faker->numberBetween(20,50),
//                'stock_actual' => $faker->numberBetween(20, 100),
//                'stock_minimo' => $faker->numberBetween(20, 100),
//                'stock_maximo' => $faker->numberBetween(20, 100),
            ));
        }
//        Producto::create(array(
//            'marca_id'=>1,
//            'categoria_id'=>1,
//            'modelo_id'=>1,
//            'codigo'=>'12345678',
//            'nombre'=>'el primer producto',
//            'precio'=>21,
//            'stock_actual'=>10,
//            'stock_minimo'=>5,
//            'stock_maximo'=>15,
//            'descripcion'=>'este es una prueba',
//            'estado'=>1,
//        ));
    }
}
