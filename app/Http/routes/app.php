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

        //registrar categoria
               Route::post('/inventario/categoria/registro','ProductoController@createCategoria' );
        //registrar marca
               Route::post('/inventario/marca/registro','ProductoController@createMarca' );
        //registrar modelo
               Route::post('/inventario/modelo/registro','ProductoController@createModelo' );



//Route::get('/buscar/producto',[
//        'as'=> 'buscar.producto',
//        'uses'=>'ProductoController@buscarProducto'
//    ]);





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
