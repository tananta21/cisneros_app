<?php




Route::group(['prefix'=>'/', 'middleware' => 'auth' ], function() {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/inventario/productos', function(){
        return view('inventario.productos.productos');
    });

    Route::get('/inventario/productos/nuevoproducto', function(){
        return view('inventario.productos.registrarproducto');
    });


    Route::get('/compra/compranueva', function(){
        return view('compra.compranueva');
    });



});

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');











Route::get('/welcome', function () {
    return view('welcome');
});
