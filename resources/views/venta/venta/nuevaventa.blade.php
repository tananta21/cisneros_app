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
                            <option selected value="1">CONTADO</option>
                            <option value="2">CREDITO</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <input type="hidden" name="id_empleado" value="{{Auth::user()->id}}"/>

        <div id="venta_contado" class="col-lg-12" style="padding-top: 2.5rem">
            <div class="col-lg-7" >
                <div id="venta_credito" class="col-lg-12" style="margin-bottom: 2rem; display: none"   >
                    <h4 class="col-lg-6" >Evaluacion Crediticia del Cliente</h4>
                    <button  style="margin-left: 0rem" data-toggle="modal" data-target="#evaluar_cliente"  class="col-lg-4 btn btn-primary"> EVALUAR CLIENTE  <i class="fa fa-user fa-1x"></i> </button>
                </div>
                <div class="col-lg-7" style="margin-bottom: 1.5rem">
                    <a data-toggle="modal" data-target="#producto_venta" href="#" style="font-size: 1.5rem" >
                        Añadir Producto
                        <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                    </a>
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
                        {{--<tr style="display: none;" id="filaPedido000">--}}

                        {{--</tr>--}}
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
                                <input readonly type="text" name="nro_venta" class="col-lg-12" value="{{$nro_venta}}" style="text-align: center"/>
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
                <div id="cajatotalcontado" class="col-lg-12" style="color: greenyellow;background: #000000; font-size: 4rem; text-align: center">
                    <span >S/. </span><span type="text" class="totalventa">0</span>
                </div>
                <div class="col-lg-12" style=" margin-top: 1rem; padding: 2rem; border: 1px solid grey;border-radius: 5px">
                    <input type="hidden" value="1" id="clienteid"/>
                    <span class="col-lg-7">Datos del Cliente (Opcional)</span>
                    <a class="col-lg-5" onclick="nuevoCliente()" style="cursor: pointer">Nuevo Cliente <i class="fa fa-file-archive-o fa-1x"></i></a>
                    <form action="/venta/consultar/cliente" onsubmit="return false" id="buscar_cliente_contado">
                        <span style="padding-top: 1rem" class="col-lg-9">N° Documento</span>
                        <div class="col-lg-12">
                            <input id="documento" maxlength="8" required name="dato_cliente" type="text" class="col-lg-5" placeholder="dni" value="" style="font-weight: bold" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-1x"></i></button>
                        </div>
                        <span style="padding-top: 1rem" class="col-lg-9">Nombres y Apellidos</span>
                        <div class="col-lg-12">
                            <input readonly id="nombresyapellidos" name="dato_cliente" type="text" class="col-lg-12" placeholder="Nombres y apeliidos" value="" style="font-weight: bold" />
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div style="text-align: center; padding-top: 2rem">
                        <button data-toggle="modal" data-target="#confirmarVenta" style="margin-right: 1.3rem; font-size: 1.8rem" class="btn btn-primary">PROCESAR ORDEN</button>
                        <a href="/venta/nuevaventa" class="btn btn-default">Cancelar Orden</a>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="col-lg-12">--}}
            {{--<input class="btn btn-default" type="text" onclick="detalle(this.value)" value="51"/>--}}
        {{--</div>--}}

        @include('venta.venta.script.scriptcronograma')
        @include('venta.venta.script.scriptventa')
        @include('venta.venta.script.scriptcliente')
        @include('venta.venta.script.scriptgraficos')
    @endsection
@endsection
<div class="modal fade" id="confirmarVenta" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmar Orden de Venta</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12" id="caja_cronograma" style="text-align: center; display: none; margin-top: 1rem; margin-bottom: 1rem">
                    <button  onclick="cronograma()" class="col-lg-12 btn btn-adn">GENERAR CRONOGRAMA DE COBRO</button>
                </div>
                <div id="cajatotalcredito" style="text-align: center; display: none; margin-bottom: 5rem">
                    <span style="font-weight: bold">Total + Intereses</span>
                    <div class="col-lg-12" style="color: #000000;background: skyblue;  font-size: 4rem; text-align: center">
                        <span >S/. </span><span type="text" class="totalventacredito">0</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" id="venta_realizada" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>

@include('venta.venta.modalcliente.creditocliente')
@include('venta.venta.modalventa.modalproducto')
@include('venta.venta.modalcliente.contadocliente')
@include('venta.venta.modalventa.modalcronograma')
@include('venta.venta.modalcliente.cliente')


