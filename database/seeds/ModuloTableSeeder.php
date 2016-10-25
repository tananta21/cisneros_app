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

        //        Mant. Productos : 7
        \DB::table('modulos')->insert([
            'descripcion' => 'Mant. Productos',
            'id_padre' => '6',
            'url'=>'#',
            'nivel'=>"2",
            'estado' => 1,
        ]);




//  INVENTARIOS 1
//        8
                \DB::table('modulos')->insert([
                    'descripcion' => 'Productos',
                    'id_padre' => "1",
                    'url'=>'/inventario/productos',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//                9
                \DB::table('modulos')->insert([
                    'descripcion' => 'Almacen',
                    'id_padre' => "1",
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        COMPRAS 2
//        10
                \DB::table('modulos')->insert([
                    'descripcion' => 'Nueva Compra',
                    'id_padre' => '2',
                    'url'=>'/compra/compranueva',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        11

                \DB::table('modulos')->insert([
                    'descripcion' => 'Lista Compras',
                    'id_padre' => '2',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//          12
                \DB::table('modulos')->insert([
                    'descripcion' => 'Proveedores',
                    'id_padre' => '2',
                    'url'=>'/compra/proveedor',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        VENTAS 3

//        13

                \DB::table('modulos')->insert([
                    'descripcion' => 'Nueva Venta',
                    'id_padre' => '3',
                    'url'=>'/venta/nuevaventa',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        14
                \DB::table('modulos')->insert([
                    'descripcion' => 'Lista Ventas',
                    'id_padre' => '3',
                    'url'=>'#',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        15

                \DB::table('modulos')->insert([
                    'descripcion' => 'Clientes',
                    'id_padre' => '3',
                    'url'=>'/venta/cliente',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        SEGURIDAD 5

//          16
                \DB::table('modulos')->insert([
                    'descripcion' => 'Empleados',
                    'id_padre' => '5',
                    'url'=>'/seguridad/empleado',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        33
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Empleado',
                    'id_padre' => '5',
                    'url'=>'/mantenimiento/tipoempleado',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);



//        17

                \DB::table('modulos')->insert([
                    'descripcion' => 'Modulos',
                    'id_padre' => '5',
                    'url'=>'/seguridad/modulo',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        18

                \DB::table('modulos')->insert([
                    'descripcion' => 'Accesos',
                    'id_padre' => '5',
                    'url'=>'/seguridad/acceso',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);



//  MANTENIMIENTOS 6

//mantenimiento de productos
//        19

                \DB::table('modulos')->insert([
                    'descripcion' => 'Categorias',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/categoria',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//        20
                \DB::table('modulos')->insert([
                    'descripcion' => 'Marcas',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/marca',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//        21
                \DB::table('modulos')->insert([
                    'descripcion' => 'Modelos',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/modelo',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//        22
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Producto',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipoproducto',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

        //mantenimiento de clientes

        //        23
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Cliente',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipocliente',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

                //        24

                \DB::table('modulos')->insert([
                    'descripcion' => 'Estado Civil',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/estadocivil',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        25
                \DB::table('modulos')->insert([
                    'descripcion' => 'Grado Instrucciones',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/gradoinstruccion',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

        //        26
                \DB::table('modulos')->insert([
                    'descripcion' => 'Ocupaciones',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/ocupacion',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//        27
                \DB::table('modulos')->insert([
                    'descripcion' => 'Ubigeos',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/ubigeo',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);


// mantenimiento de compra- venta

//        28
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Transaccion',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipotransaccion',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        29
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Comprobante',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipocomprobante',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        30
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Pagos',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipopago',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);
//        31
                \DB::table('modulos')->insert([
                    'descripcion' => 'Tipo Movimiento',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/tipomovimiento',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

//        32
                \DB::table('modulos')->insert([
                    'descripcion' => 'Concepto Movimiento',
                    'id_padre' => '6',
                    'url'=>'/mantenimiento/conceptomovimiento',
                    'nivel'=>"2",
                    'estado' => 1,
                ]);

















    }
}
