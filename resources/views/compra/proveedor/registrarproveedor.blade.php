@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$("#modulo-venta").addClass('active');--}}
        {{--});--}}
    {{--</script>--}}

@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Proveedor</h4>
    <hr class="col-lg-12 linea-titulo" size="2px" color="green"/>

    <div >
        <form method="POST" action="/inventario/producto/registro" accept-charset="UTF-8" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="">

            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Ubigeo</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto">
                            <option value="1">Natural</option>
                            <option value="2">Juridica</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero de documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                               type="text" class="form-control" placeholder="DNI O RUC" name="serie" value="">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre del Proveedor</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nombre Proveedor" name="nombre" value="">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Encargado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Encargado" name="apellido" value="">
                    </div>
                </div>

            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Telefono</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="tetx" class="form-control" placeholder="nº de telefono" name="telefono" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" name="correo" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Direccion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input  type="radio"  name="estado" value="1" checked> Activo
                        <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <a type="button" href="/venta/cliente" class="btn btn-default" style="margin-right: 1rem">CANCELAR</a>
                <button type="submit" class="btn btn-primary">ACEPTAR</button>
            </div>

        </form>
    </div>


@endsection
@endsection