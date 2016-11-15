@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    @section('contenido_modulos')

        <div style="padding-top: 2rem">
            <div class="col-lg-12">
                <form method="POST" action="" accept-charset="UTF-8"  class="form-horizontal" role="form">
                    <div class="col-lg-12">
                        <span style="margin-right: 1.5rem">SELECCIONE TIPO DE VENTA</span>
                        <select name="tipo_venta" id="tipo_venta" onchange="cambiarVenta(this.value);">
                            <option value="1">CONTADO</option>
                            <option value="2">CREDITO</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div id="venta_credito" class="col-lg-12" style="margin-top: 2rem; display: none"   >
            <h4 class="col-lg-4" >Evaluacion Crediticia del Cliente</h4>
            <button  style="margin-left: 0rem" data-toggle="modal" data-target="#evaluar_cliente"  class="col-lg-2 btn btn-primary"> EVALUAR CLIENTE  <i class="fa fa-user fa-1x"></i> </button>
        </div>
        <div id="venta_contado" class="col-lg-12" style="padding-top: 2.5rem">
            <div class="col-lg-7" >
                <div class="col-lg-7" style="margin-bottom: 1.5rem">
                    <a data-toggle="modal" data-target="#producto_venta" href="#" style="font-size: 1.5rem" >
                        Añadir Producto
                        <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
                <div id="caja_cronograma" class="col-lg-5" style="margin-bottom: 1.5rem; margin-top: 1rem; display: none;">
                    <button onclick="cronograma()" class="btn btn-circle">Generar Cronograma</button>
                </div>

                {{--detalle venta--}}
                <div class="col-lg-12">
                    <table class="table table-hover" id="myTable" onchange="colSum()" style="font-size: 1.3rem;">
                        <thead>
                        <tr>
                            <th>CANT</th>
                            <th>NOMBRE</th>
                            <th>P. UNIT.</th>
                            <th>SUB-TOTAL</th>
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody id="cuerpo">
                        <tr style="display: none;" id="filaPedido">

                        </tr>
                        </tbody>
                    </table>
                    <div id="total_productos"></div>
                </div>
            </div>
            {{--datos del cliente--}}
            <div class="col-lg-5">
                <div class="col-lg-12" style=" margin-top: 1rem; border: 1px solid grey;border-radius: 5px; background: #d3d3d3">
                    <div class="col-lg-12" style="padding: 1rem" >
                        <div class="col-lg-12">
                            <div class="col-lg-4" style="text-align: center">
                                <span style="font-weight: bold;"> N° ORDEN DE VENTA </span>
                            </div>
                            <div class="col-lg-8" style="text-align: center">
                                <input readonly type="text" name="nro_venta" class="col-lg-12" value="{{$nro_venta['id']}}" style="text-align: center"/>
                            </div>
                        </div>

                        <div class="col-lg-12" style="padding-top: 1rem">
                            <div class="col-lg-4" style="text-align: center">
                                <span style="font-weight: bold;"> FECHA </span>
                            </div>
                            <div class="col-lg-8" style="text-align: center">
                                <input id="fecha_venta" readonly type="text"  class="col-lg-12" style="text-align: center"/>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12" style="color: greenyellow;background: #000000; font-size: 4rem; text-align: center">
                    <span >S/. </span><span type="text" class="totalventa">0</span>
                </div>

                <div class="col-lg-12" style=" margin-top: 1rem; padding: 2rem; border: 1px solid grey;border-radius: 5px">
                    <span class="col-lg-7">Datos del Cliente (Opcional)</span>
                    <a class="col-lg-5" data-toggle="modal" data-target="#registrar_cliente" href="#">Nuevo Cliente <i class="fa fa-file-archive-o fa-1x"></i></a>
                    <form action="/venta/consultar/cliente" onsubmit="return false" id="buscar_cliente_contado">
                        <span style="padding-top: 1rem" class="col-lg-9">N° Documento</span>
                        <div class="col-lg-12">
                            <input id="documento" maxlength="8" required name="dato_cliente" type="text" class="col-lg-5" placeholder="dni" value="" style="font-weight: bold" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-1x"></i></button>
                        </div>
                        <span style="padding-top: 1rem" class="col-lg-9">Nombres y Apellidos</span>
                        <div class="col-lg-12">
                            <input id="nombresyapellidos" name="dato_cliente" type="text" class="col-lg-9" placeholder="Nombres y apeliidos" value="" style="font-weight: bold" />
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div style="text-align: center; padding-top: 2rem">
                        <button  style="margin-right: 1.3rem" class="btn btn-primary">PROCESAR ORDEN</button>
                        <button class="btn btn-default">CANCELAR</button>
                    </div>
                </div>
            </div>
        </div>


        @include('venta.venta.scriptventa')
    @endsection
@endsection


{{--modal evaluar cliente--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="evaluar_cliente" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CONSULTAR CLIENTE</h4>
                </div>
                <div class="modal-body">
                        <form method="GET" id="buscar_cliente" action="/venta/consultar/cliente" accept-charset="UTF-8"  class="form-horizontal" role="form" onsubmit="return false;">
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-primary">BUSCAR</button>
                            </div>
                            <div class="col-lg-6">
                                <input id="dato" required="true" type="text"  maxlength="30" class="form-control" placeholder="Nro Documento o Nombres del Cliente" name="dato_cliente" value="" >
                            </div>
                            <div class="col-lg-1">
                                <div class="btn btn-default btn-md" id="limpiar"><i class="fa fa-refresh fa-1x"> Limpiar</i>
                                </div>
                            </div>
                        </form>
                        <div style="padding-top: 2rem">
                             <table style="font-size: 1.5rem"  class="table table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>DOCUMENTO</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>ACCION</th>
                                </tr>
                                </thead>
                                <tbody id="lista_clientes">

                                </tbody>
                            </table>
                         </div>
                    </div>
            </div>
        </div>
    </div>
</div>


{{--modal detalles del cliente--}}
<div class="modal fade" id="detalle_cliente" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalles del Cliente</h4>
            </div>
            <div class="modal-body">
                <div>
                    <h4 style="margin-top: 0rem">Datos Personales</h4>
                    <span>Nombre Completo</span>
                    <span id="nombre"></span>
                </div>
                <div>
                    <h5>Total de compras realizadas</h5>
                    <span id="total_compras"></span>
                    <span id="total"></span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

{{--modal BUSCAR PRODUCTOS EN VENTAS--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="producto_venta" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BUSCAR PRODUCTO</h4>
                </div>
                <div class="modal-body">
                    {{--formulario Buscar producto en ventas--}}
                    <div class="box box-primary">
                        <form action="/venta/buscarproducto" method="get" onsubmit="return false"  id="formulario_busqueda" style="margin-top: 1.5rem; margin-bottom: 1.3rem" >
                            <div class="col-lg-12">
                                <button type="submit" >Buscar  <i class="fa fa-search fa-1x"></i></button>
                                <input required="true" type="text" id="codi" name="codigo" placeholder="Ingrese Serie o Nombre" style="width: 25rem"/>
                                <div class="btn btn-primary btn-md" id="limpiarproducto"><i class="fa fa-refresh fa-1x"> Limpiar</i></div>
                                {{--<select name="tipoproducto">--}}
                                {{--<option value="1">Producto</option>--}}
                                {{--<option value="2">Servicio</option>--}}
                                {{--</select>--}}
                            </div>
                        </form>
                        <table class="table table-hover"  style="font-size: 1.3rem">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>P. Unit.</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody id="respuesta">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--buscar cliente en venta al contado--}}
<div class="modal fade" id="cliente_contado" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Busqueda de cliente</h4>
            </div>
            <div class="modal-body">
                <div>
                    <table style="font-size: 1.2rem"  class="table table-hover display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>DOCUMENTO</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody id="lista_contado">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

{{--modal CRONOGRAMA DE PAGO--}}
<div class="modal fade" id="cronograma_pago" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cronograma de Pago</h4>
            </div>
            <div class="modal-body col-lg-12">

                    <div class="col-lg-12">
                        <form action="">
                            <div class="col-lg-3">
                                <span class="col-lg-6">TOTAL VENTA S/.</span>
                                <input id="total_cronograma" readonly type="text" class="col-lg-6"/>
                            </div>
                            <div class="col-lg-3">
                                <span class="col-lg-4">PAGO</span>
                                <select name="fecha_pago" id="fecha_pago">
                                    <option value="1">Diario</option>
                                    <option value="2">Semanal</option>
                                    <option value="3">Quincenal</option>
                                    <option value="4">Mensual</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <span class="col-lg-5">N° CUOTAS</span>
                                <input id="cuotas" type="number" min="0" class="col-lg-5"/>
                            </div>

                            <div class="col-lg-3">
                                <span class="col-lg-5">TASA INTERES %</span>
                                <input id="interes" type="number" min="0" value="5" class="col-lg-5"/>
                            </div>
                        </form>
                    <div class="col-lg-12" style="text-align: center; margin-top: 2rem">
                        <div class="col-lg-12">
                            <button class="btn btn-primary" onclick="generarCuotas()">Generar Cuotas</button>
                        </div>
                    </div>

                </div>


                <div class="col-lg-12" style="padding-top: 2rem">
                    <table style="font-size: 1.2rem"  class="table table-hover display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>N° CUOTA</th>
                            <th>FECHA PAGO</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                        </tr>
                        </thead>
                        <tbody id="lista_cuotas">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@include('venta.venta.modalcliente.cliente')