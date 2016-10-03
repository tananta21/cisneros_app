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


//    CATEGORIAS------------------------------------------------------
//    mantenimiento categoria:listar categorias
    Route::get('/mantenimiento/categoria','MantenimientoController@listarCategoria');
    //registrar categoria
    Route::post('/inventario/categoria/registro','MantenimientoController@crearCategoria' );
    //    editar categoria
    Route::get('/mantenimiento/categoria/editar',['as'=> 'editar.categoria','uses'=>'MantenimientoController@editarCategoria']);
    //  actualizar categoria
    Route::post('/mantenimiento/categoria/actualizar',['as'=> 'actualizar.categoria','uses'=>'MantenimientoController@actualizarCategoria']);
    //    eliminar categoria: cambiar de estado
    Route::get('/mantenimiento/categoria/eliminar',['as'=> 'eliminar.categoria','uses'=>'MantenimientoController@eliminarCategoria']);
    //      buscar categoria
    Route::get('/mantenimiento/categoria/buscar',['as'=> 'buscar.categoria','uses'=>'MantenimientoController@buscarCategoria']);

//    MARCAS-------------------------------------------------------
//    mantenimiento marcas: listar marcas
    Route::get('/mantenimiento/marca','MantenimientoController@listarMarca');
    //registrar marca
    Route::post('/inventario/marca/registro','MantenimientoController@crearMarca' );
    //    editar marca
    Route::get('/mantenimiento/marca/editar',['as'=> 'editar.marca','uses'=>'MantenimientoController@editarMarca']);
    //  actualizar marca
    Route::post('/mantenimiento/marca/actualizar',['as'=> 'actualizar.marca','uses'=>'MantenimientoController@actualizarMarca']);
    //    eliminar marca: cambiar de estado
    Route::get('/mantenimiento/marca/eliminar',['as'=> 'eliminar.marca','uses'=>'MantenimientoController@eliminarMarca']);
    //      buscar marca
    Route::get('/mantenimiento/marca/buscar',['as'=> 'buscar.marca','uses'=>'MantenimientoController@buscarMarca']);

//    MODELOS-------------------------------------------------------
//    mantenimiento modelos: listar modelos
    Route::get('/mantenimiento/modelo','MantenimientoController@listarModelo');
    //registrar modelo
    Route::post('/inventario/modelo/registro','MantenimientoController@crearModelo' );
    //    editar modelo
    Route::get('/mantenimiento/modelo/editar',['as'=> 'editar.modelo','uses'=>'MantenimientoController@editarModelo']);
    //  actualizar marca
    Route::post('/mantenimiento/modelo/actualizar',['as'=> 'actualizar.modelo','uses'=>'MantenimientoController@actualizarModelo']);
    //    eliminar modelo: cambiar de estado
    Route::get('/mantenimiento/modelo/eliminar',['as'=> 'eliminar.modelo','uses'=>'MantenimientoController@eliminarModelo']);
    //      buscar modelo
    Route::get('/mantenimiento/modelo/buscar',['as'=> 'buscar.modelo','uses'=>'MantenimientoController@buscarModelo']);
























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
