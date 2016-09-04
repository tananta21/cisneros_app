<?php




Route::group(['prefix'=>'/', 'middleware' => 'auth' ], function() {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/inventario/productos', function(){
        return view('inventario.productos');
    });
    Route::get('/compra/nuevacompra', function(){
        return view('compra.compranueva');
    });



});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');











Route::get('/welcome', function () {
    return view('welcome');
});
