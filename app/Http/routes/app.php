<?php

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');


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



//==================================================================================
////==================================================================================
                                        //  MODULO DE VENTAS
//==================================================================================


//      VENTAS
//    ============================================================

//    realizar una venta nueva
    Route::get('/venta/nuevaventa', function(){
        return view('venta.venta.nuevaventa');
    });
//    buscar producto en la vista de venta
    Route::get('/venta/buscarproducto','VentaController@buscarProducto');

//    listar las ventas realizadas
    Route::get('/venta/lista', function(){
        return view('venta.listaventa');
    });
//   vista registro de una nueva venta
    Route::get('/venta/registro', function(){
        return view('venta.venta.registroventa');
    });



//    CLIENTES
//    ==================================================================
    //    listar clientes
    Route::get('/venta/cliente', function(){
        return view('venta.cliente.listacliente');
    });

    //   Registrar cliente
    Route::get('/venta/cliente/registro', function(){
        return view('venta.cliente.registrarcliente');
    });






//==================================================================================
////==================================================================================
                            //  MODULO MANTENIMIENTO
//==================================================================================

    Route::get('/mantenimiento/principal', function(){
        return view('mantenimiento.inicio');
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

//   TIPO PRODUCTO---------------------------------------------------
    Route::get('/mantenimiento/tipoproducto','MantenimientoController@listarTipoProducto');
    //registrar tipoproducto
    Route::post('/inventario/tipoproducto/registro','MantenimientoController@crearTipoProducto' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipoproducto/editar',['as'=> 'editar.tipoproducto','uses'=>'MantenimientoController@editarTipoProducto']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipoproducto/actualizar',['as'=> 'actualizar.tipoproducto','uses'=>'MantenimientoController@actualizarTipoProducto']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipoproducto/eliminar',['as'=> 'eliminar.tipoproducto','uses'=>'MantenimientoController@eliminarTipoProducto']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipoproducto/buscar',['as'=> 'buscar.tipoproducto','uses'=>'MantenimientoController@buscarTipoProducto']);

//    ========================================================================================
//                           MANTENIMIENTO DE EMPLEADO_CLIENTE
//    ===================================================================================

    //   TIPO EMPLEADO---------------------------------------------------
    Route::get('/mantenimiento/tipoempleado','MantenimientoEmpleadoController@listarTipoEmpleado');
    //registrar tipoproducto
    Route::post('/inventario/tipoempleado/registro','MantenimientoEmpleadoController@crearTipoEmpleado' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipoempleado/editar',['as'=> 'editar.tipoempleado','uses'=>'MantenimientoEmpleadoController@editarTipoEmpleado']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipoempleado/actualizar',['as'=> 'actualizar.tipoempleado','uses'=>'MantenimientoEmpleadoController@actualizarTipoEmpleado']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipoempleado/eliminar',['as'=> 'eliminar.tipoempleado','uses'=>'MantenimientoEmpleadoController@eliminarTipoEmpleado']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipoempleado/buscar',['as'=> 'buscar.tipoempleado','uses'=>'MantenimientoEmpleadoController@buscarTipoEmpleado']);


    //  ESTADO CIVIL---------------------------------------------------
    Route::get('/mantenimiento/estadocivil','MantenimientoEmpleadoController@listarEstadoCivil');
    //registrar tipoproducto
    Route::post('/inventario/estadocivil/registro','MantenimientoEmpleadoController@crearEstadoCivil' );
    //    editar tipoproducto
    Route::get('/mantenimiento/estadocivil/editar',['as'=> 'editar.estadocivil','uses'=>'MantenimientoEmpleadoController@editarEstadoCivil']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/estadocivil/actualizar',['as'=> 'actualizar.estadocivil','uses'=>'MantenimientoEmpleadoController@actualizarEstadoCivil']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/estadocivil/eliminar',['as'=> 'eliminar.estadocivil','uses'=>'MantenimientoEmpleadoController@eliminarEstadoCivil']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/estadocivil/buscar',['as'=> 'buscar.estadocivil','uses'=>'MantenimientoEmpleadoController@buscarEstadoCivil']);


    //  GRADO INSTRUCCION---------------------------------------------------
    Route::get('/mantenimiento/gradoinstruccion','MantenimientoEmpleadoController@listaGradoInstruccion');
    //registrar tipoproducto
    Route::post('/inventario/gradoinstruccion/registro','MantenimientoEmpleadoController@crearGradoInstruccion' );
    //    editar tipoproducto
    Route::get('/mantenimiento/gradoinstruccion/editar',['as'=> 'editar.gradoinstruccion','uses'=>'MantenimientoEmpleadoController@editarGradoInstruccion']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/gradoinstruccion/actualizar',['as'=> 'actualizar.gradoinstruccion','uses'=>'MantenimientoEmpleadoController@actualizarGradoInstruccion']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/gradoinstruccion/eliminar',['as'=> 'eliminar.gradoinstruccion','uses'=>'MantenimientoEmpleadoController@eliminarGradoInstruccion']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/gradoinstruccion/buscar',['as'=> 'buscar.gradoinstruccion','uses'=>'MantenimientoEmpleadoController@buscarGradoInstruccion']);


    //  OCUPACIONES---------------------------------------------------
    Route::get('/mantenimiento/ocupacion','MantenimientoEmpleadoController@listaOcupacion');
    //registrar tipoproducto
    Route::post('/inventario/ocupacion/registro','MantenimientoEmpleadoController@crearOcupacion' );
    //    editar tipoproducto
    Route::get('/mantenimiento/ocupacion/editar',['as'=> 'editar.ocupacion','uses'=>'MantenimientoEmpleadoController@editarOcupacion']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/ocupacion/actualizar',['as'=> 'actualizar.ocupacion','uses'=>'MantenimientoEmpleadoController@actualizarOcupacion']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/ocupacion/eliminar',['as'=> 'eliminar.ocupacion','uses'=>'MantenimientoEmpleadoController@eliminarOcupacion']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/ocupacion/buscar',['as'=> 'buscar.ocupacion','uses'=>'MantenimientoEmpleadoController@buscarOcupacion']);

    //  TIPO CLIENTE---------------------------------------------------
    Route::get('/mantenimiento/tipocliente','MantenimientoEmpleadoController@listaTipoCliente');
    //registrar tipoproducto
    Route::post('/inventario/tipocliente/registro','MantenimientoEmpleadoController@crearTipoCliente' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipocliente/editar',['as'=> 'editar.tipocliente','uses'=>'MantenimientoEmpleadoController@editarTipoCliente']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipocliente/actualizar',['as'=> 'actualizar.tipocliente','uses'=>'MantenimientoEmpleadoController@actualizarTipoCliente']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipocliente/eliminar',['as'=> 'eliminar.tipocliente','uses'=>'MantenimientoEmpleadoController@eliminarTipoCliente']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipocliente/buscar',['as'=> 'buscar.tipocliente','uses'=>'MantenimientoEmpleadoController@buscarTipoCliente']);


    //    ========================================================================================
//                           MANTENIMIENTO DE COMPRA_VENTA
//    ===================================================================================

    //  TIPO COMPROBANTE---------------------------------------------------
    Route::get('/mantenimiento/tipocomprobante','MantenimientoCompraVentaController@listaTipoComprobante');
    //registrar tipoproducto
    Route::post('/inventario/tipocomprobante/registro','MantenimientoCompraVentaController@crearTipoComprobante' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipocomprobante/editar',['as'=> 'editar.tipocomprobante','uses'=>'MantenimientoCompraVentaController@editarTipoComprobante']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipocomprobante/actualizar',['as'=> 'actualizar.tipocomprobante','uses'=>'MantenimientoCompraVentaController@actualizarTipoComprobante']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipocomprobante/eliminar',['as'=> 'eliminar.tipocomprobante','uses'=>'MantenimientoCompraVentaController@eliminarTipoComprobante']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipocomprobante/buscar',['as'=> 'buscar.tipocomprobante','uses'=>'MantenimientoCompraVentaController@buscarTipoComprobante']);



    //  TIPO PAGO------------------------------------------------------------------------------------
    Route::get('/mantenimiento/tipopago','MantenimientoCompraVentaController@listaTipoPago');
    //registrar tipoproducto
    Route::post('/inventario/tipopago/registro','MantenimientoCompraVentaController@crearTipoPago' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipopago/editar',['as'=> 'editar.tipopago','uses'=>'MantenimientoCompraVentaController@editarTipoPago']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipopago/actualizar',['as'=> 'actualizar.tipopago','uses'=>'MantenimientoCompraVentaController@actualizarTipoPago']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipopago/eliminar',['as'=> 'eliminar.tipopago','uses'=>'MantenimientoCompraVentaController@eliminarTipoPago']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipopago/buscar',['as'=> 'buscar.tipopago','uses'=>'MantenimientoCompraVentaController@buscarTipoPago']);

    //  TIPO TRANSACCION------------------------------------------------------------------------------------
    Route::get('/mantenimiento/tipotransaccion','MantenimientoCompraVentaController@listaTipoTransaccion');
    //registrar tipoproducto
    Route::post('/mantenimiento/tipotransaccion/registro','MantenimientoCompraVentaController@crearTipoTransaccion' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipotransaccion/editar',['as'=> 'editar.tipotransaccion','uses'=>'MantenimientoCompraVentaController@editarTipoTransaccion']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipotransaccion/actualizar',['as'=> 'actualizar.tipotransaccion','uses'=>'MantenimientoCompraVentaController@actualizarTipoTransaccion']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipotransaccion/eliminar',['as'=> 'eliminar.tipotransaccion','uses'=>'MantenimientoCompraVentaController@eliminarTipoTransaccion']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipotransaccion/buscar',['as'=> 'buscar.tipotransaccion','uses'=>'MantenimientoCompraVentaController@buscarTipoTransaccion']);

    //  TIPO MOVIMIENTO------------------------------------------------------------------------------------
    Route::get('/mantenimiento/tipomovimiento','MantenimientoCompraVentaController@listaTipoMovimiento');
    //registrar tipoproducto
    Route::post('/mantenimiento/tipomovimiento/registro','MantenimientoCompraVentaController@crearTipoMovimiento' );
    //    editar tipoproducto
    Route::get('/mantenimiento/tipomovimiento/editar',['as'=> 'editar.tipomovimiento','uses'=>'MantenimientoCompraVentaController@editarTipoMovimiento']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/tipomovimiento/actualizar',['as'=> 'actualizar.tipomovimiento','uses'=>'MantenimientoCompraVentaController@actualizarTipoMovimiento']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/tipomovimiento/eliminar',['as'=> 'eliminar.tipomovimiento','uses'=>'MantenimientoCompraVentaController@eliminarTipoMovimiento']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/tipomovimiento/buscar',['as'=> 'buscar.tipomovimiento','uses'=>'MantenimientoCompraVentaController@buscarTipoMovimiento']);

    //  TIPO CONCEPTO MOVIMIENTO------------------------------------------------------------------------------------
    Route::get('/mantenimiento/conceptomovimiento','MantenimientoCompraVentaController@listaConceptoMovimiento');
    //registrar tipoproducto
    Route::post('/mantenimiento/conceptomovimiento/registro','MantenimientoCompraVentaController@crearConceptoMovimiento' );
    //    editar tipoproducto
    Route::get('/mantenimiento/conceptomovimiento/editar/{id}',['as'=> 'editar.conceptomovimiento','uses'=>'MantenimientoCompraVentaController@editarConceptoMovimiento']);
    //  actualizar tipoproducto
    Route::post('/mantenimiento/conceptomovimiento/actualizar',['as'=> 'actualizar.conceptomovimiento','uses'=>'MantenimientoCompraVentaController@actualizarConceptoMovimiento']);
    //    eliminar tipoproducto: cambiar de estado
    Route::get('/mantenimiento/conceptomovimiento/eliminar',['as'=> 'eliminar.conceptomovimiento','uses'=>'MantenimientoCompraVentaController@eliminarConceptoMovimiento']);
    //      buscar tipoproducto
    Route::get('/mantenimiento/conceptomovimiento/buscar',['as'=> 'buscar.conceptomovimiento','uses'=>'MantenimientoCompraVentaController@buscarConceptoMovimiento']);

































    Route::get('/compra/compranueva', function(){
        return view('compra.compranueva');
    });

    Route::get('/ventas/registrar',[
        'as'=> 'registrar.venta',
        'uses'=>'VentaController@create']);



});

































