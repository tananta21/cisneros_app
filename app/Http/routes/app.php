<?php




Route::group(['prefix'=>'/', 'middleware' => 'auth' ], function() {

    Route::get('/', function () {
        return view('index');
    });


//PRODUCTOS
        //    listar productos
            Route::get('/inventario/productos', 'ProductoController@index' );

        //    registrar producto
            Route::get('/inventario/producto/nuevoproducto','ProductoController@nuevoProducto' );


            Route::post('/inventario/producto/registro','ProductoController@create' );

        //    editar producto
            Route::get('/inventario/producto/editar/{id}','ProductoController@edit');

        //    actualizar producto
            Route::post('/inventario/producto/actualizar/{id}', 'ProductoController@update' );

        //    eliminar producto
            Route::get('/producto/eliminar',[
                'as'=> 'eliminar.producto',
                'uses'=>'ProductoController@eliminarProducto'
            ]);
        //    buscarProducto
            Route::get('/buscar/producto',[
                'as'=> 'buscar.producto',
                'uses'=>'ProductoController@busquedaProducto'
            ]);


        //registrar marca
               Route::post('/inventario/marca/registro','ProductoController@createMarca' );
        //registrar modelo
               Route::post('/inventario/modelo/registro','ProductoController@createModelo' );

//Route::get('/buscar/producto',[
//        'as'=> 'buscar.producto',
//        'uses'=>'ProductoController@buscarProducto'
//    ]);

//VENTAS

    Route::get('/venta/nuevaventa', function(){
        return view('venta.nuevaventa');
    });
//    buscar producto en la vista de venta
    Route::get('/venta/buscarproducto','VentaController@buscarProducto');
//    listar las ventas realizadas
    Route::get('/venta/lista', function(){
        return view('venta.listaventa');
    });
//    registro de una nueva venta
    Route::get('/venta/registro', function(){
        return view('venta.registroventa');
    });

//  MODULO MANTENIMIENTO
    Route::get('/mantenimiento/principal', function(){
        return view('mantenimiento.principal');
    });
//    mantenimiento categoria:listar categorias
    Route::get('/mantenimiento/categoria','MantenimientoController@listarCategoria');
    //registrar categoria
    Route::post('/inventario/categoria/registro','MantenimientoController@crearCategoria' );
    //    editar categoria
    Route::get('/mantenimiento/categoria/editar',['as'=> 'editar.categoria','uses'=>'MantenimientoController@editarCategoria']);
    //  actualizar categoria
    Route::post('/mantenimiento/categoria/actualizar',['as'=> 'editar.actualizar','uses'=>'MantenimientoController@actualizarCategoria']);
    //    eliminar categoria: cambiar de estado
    Route::get('/mantenimiento/categoria/eliminar',['as'=> 'eliminar.categoria','uses'=>'MantenimientoController@eliminarCategoria']);
    //      buscar categoria
    Route::get('/mantenimiento/categoria/buscar',['as'=> 'buscar.categoria','uses'=>'MantenimientoController@buscarCategoria']);
























    Route::get('/compra/compranueva', function(){
        return view('compra.compranueva');
    });

    Route::get('/ventas/registrar',[
        'as'=> 'registrar.venta',
        'uses'=>'VentaController@create']);



});

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');











Route::get('/welcome', function () {
    return view('welcome');
});
