@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Editar Servicio</h4>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

    <script>
        $(document).ready(function () {
            $("#modulo-inventario").addClass('active');
        });
    </script>

    <div>
        <form method="POST" action="/inventario/producto/actualizar/{{$editarProducto->id}}" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}

            <div class="col-lg-6 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Tipo Producto</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <input  readonly type="text" class="form-control" placeholder="Serie o Codigo Producto" name="tipo_producto" value="Servicio">
                        <input  type="hidden" name="tipo_producto" value="2">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" type="text" class="form-control" placeholder="Serie o Codigo Producto" name="serie" value="{{$editarProducto->serie}}">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" required="true" class="form-control" onkeypress="return soloLetras(event)" maxlength="50" placeholder="Nombre Producto" name="nombre" value="{{$editarProducto->nombre}}">
                    </div>
                </div>

            </div>
            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Precio</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input step="any" required  type="number" class="form-control" placeholder="S/. " name="precio" value="{{$editarProducto->precio}}" onkeypress="return NumCheck(event, this)" min="0" max="99999" maxlength="5" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Descripcion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input type="text" class="form-control" onkeypress="return soloLetras(event)" maxlength="50" placeholder="Descripcion Producto" name="descripcion" value="{{$editarProducto->descripcion}}" >
                    </div>
                </div>
            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        @if($editarProducto->estado==1)
                            <input type="radio"  name="estado" value="{{$editarProducto->estado==1}}" checked> Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                        @else
                            <input  type="radio"  name="estado" value="1"> Activo
                            <input type="radio" name="estado" value="{{$editarProducto->estado==1}}" style="margin-left: 2rem" checked > Inactivo
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem" >ACEPTAR</button>
                <a type="button" href="javascript:window.history.back();" class="btn btn-default">CANCELAR</a>
            </div>
        </form>
    </div>


@endsection

