<?php

use Illuminate\Database\Seeder;

class ModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        1
        \DB::table('modulos')->insert([
            'descripcion' => 'Inventario',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-pencil-square-o",
            'estado' => 1,
        ]);

 //        2
        \DB::table('modulos')->insert([
            'descripcion' => 'Compras',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-shopping-cart",
            'estado' => 1,
        ]);

//        3
        \DB::table('modulos')->insert([
            'descripcion' => 'Ventas',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-money",
            'estado' => 1,
        ]);

        //        4
        \DB::table('modulos')->insert([
            'descripcion' => 'Reportes',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-bar-chart",
            'estado' => 1,
        ]);

        //        5
        \DB::table('modulos')->insert([
            'descripcion' => 'Seguridad',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-lock",
            'estado' => 1,
        ]);

        //        6
        \DB::table('modulos')->insert([
            'descripcion' => 'Mantenimientos',
            'id_padre' => null,
            'url'=>'#',
            'nivel'=>"1",
            'icono'=>"fa fa-cogs",
            'estado' => 1,
        ]);




//  INVENTARIOS 1
                \DB::table('modulos')->insert([
                    'descripcion' => 'Productos',
                    'id_padre' => "1",
                    'url'=>'/inventario/productos',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Almacen',
                    'id_padre' => "1",
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        COMPRAS 2
                \DB::table('modulos')->insert([
                    'descripcion' => 'Nueva Compra',
                    'id_padre' => '2',
                    'url'=>'/compra/compranueva',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Lista Compras',
                    'id_padre' => '2',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Proveedores',
                    'id_padre' => '2',
                    'url'=>'/compra/proveedor',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

<<<<<<< HEAD
//        VENTAS 3

                \DB::table('modulos')->insert([
                    'descripcion' => 'Nueva Venta',
                    'id_padre' => '3',
                    'url'=>'/venta/nuevaventa',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Lista Ventas',
                    'id_padre' => '3',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Clientes',
                    'id_padre' => '3',
                    'url'=>'/venta/cliente',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        SEGURIDAD 5

                \DB::table('modulos')->insert([
                    'descripcion' => 'Empleados',
                    'id_padre' => '5',
                    'url'=>'/seguridad/empleado',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Modulos',
                    'id_padre' => '5',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Perfiles',
                    'id_padre' => '5',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                \DB::table('modulos')->insert([
                    'descripcion' => 'Accesos',
                    'id_padre' => '5',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//  MANTENIMIENTOS 6

                \DB::table('modulos')->insert([
                    'descripcion' => 'Categorias',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/categoria',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
                \DB::table('modulos')->insert([
                    'descripcion' => 'Marcas',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/marca',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
                \DB::table('modulos')->insert([
                    'descripcion' => 'Marcas',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/modelo',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);







=======
//        COMPRAS 2
>>>>>>> 2bae92185f269508d3cbb6a2d3620dcd290ce084


    }
}
