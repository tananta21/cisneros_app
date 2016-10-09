<?php
use App\Core\Proveedors\Proveedors;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProveedorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Proveedors::create(array(
                'nro_documento' => $faker->numberBetween(8),
                'nombre' => $faker->firstName,
                'telefono' => $faker->phoneNumber,
                'encargado' => $faker->firstName,
                'direccion' => $faker->address,
                'correo' => $faker->email,
                'estado' => $faker->numberBetween(0, 1)

            ));
        }
    }
}

