@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    <script>
        $(document).ready(function () {
            $("#modulo-compra").addClass('active');
        });
    </script>

@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Editar Proveedor</h4>
    <hr class="col-lg-12 linea-titulo" size="2px" color="green"/>

    <div >
        <form method="POST" action="/compra/proveedor/actualizar/{{$proveedor->id}}" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}

            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero de documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                               type="text" class="form-control" placeholder="DNI O RUC" name="nro_documento" value="{{$proveedor->nro_documento}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre del Proveedor</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text"onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Nombre Proveedor" name="nombre" value="{{$proveedor->nombre}}">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Encargado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Encargado" name="encargado" value="{{$proveedor->encargado}}">
                    </div>
                </div>

            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Telefono</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="tetx"  maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"class="form-control" placeholder="nº de telefono" name="telefono" value="{{$proveedor->telefono}}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="email" maxlength="50"class="form-control" placeholder="ejemplo@ejemplo.com" name="correo" value="{{$proveedor->correo}}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Direccion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" maxlength="50"class="form-control" placeholder="Direccion" name="direccion" value="{{$proveedor->direccion}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Departamento</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="departamento" onchange="buscarProvincia(this.value);">
                            <option value="0">Seleccione Departamento</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->numubigeo}}">{{$departamento->departamento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Provincia</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select id="provincias" disabled class="form-control" name="provincia" onchange="buscarDistrito(this.value);">
                            <option value="">Seleccione Provincia</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Distrito</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select id="distritos" disabled class="form-control" name="distrito">
                            <option value="0">Seleccione Distrito</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        @if($proveedor->estado==1)
                            <input  type="radio"  name="estado" value="1" checked> Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                        @else
                            <input  type="radio"  name="estado" value="1" > Activo
                            <input type="radio" name="estado" value="0" checked style="margin-left: 2rem"> Inactivo
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem">ACEPTAR</button>
                <a type="button" href="/compra/proveedor" class="btn btn-default">CANCELAR</a>
            </div>

        </form>
    </div>


@endsection
@endsection