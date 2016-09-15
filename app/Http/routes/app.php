<?php




Route::group(['prefix'=>'/', 'middleware' => 'auth' ], function() {

    Route::get('/', function () {
        return view('index');
    });


    //PRODUCTOS
//    listar productos
    Route::get('/inventario/productos', 'ProductoController@index' );

//    eliminar producto
//    Route::get('/producto/eliminar/{id}', 'ProductoController@destroy' );

    Route::get('/producto/eliminar',[
        'as'=> 'eliminar.producto',
        'uses'=>'ProductoController@eliminarProducto'
    ]);


    Route::get('/inventario/productos/nuevoproducto', function(){
        return view('inventario.productos.registrarproducto');
    });


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
