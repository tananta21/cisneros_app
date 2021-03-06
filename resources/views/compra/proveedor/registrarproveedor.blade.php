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

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Proveedor</h4>
    <hr class="col-lg-12 linea-titulo" size="2px" color="green"/>

    <div >
        <form method="POST" action="/compra/proveedor/registro" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}
            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero Documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input onkeydown="comprobarDocumento(this.value)" onkeyup="comprobarDocumento(this.value)" id="documento" required="true" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57 ) event.returnValue = false;"
                               type="text" class="form-control" placeholder="DNI O RUC" name="nro_documento" value="" style="font-size: 1.5rem">

                    <span style="display:none; color: red" id="error_documento">N° de RUC Incorrecto</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Tipo Proveedor</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input id="tipo_proveedor" readonly type="text" class="form-control"/>
                    </div>
                </div>

            </div>


            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Razon Social</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Nombre Proveedor" name="nombre" value="">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Encargado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Encargado" name="encargado" value="">
                    </div>
                </div>

            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Telefono</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="tetx" class="form-control" placeholder="nº de telefono" name="telefono" value=""  maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="email" maxlength=50 class="form-control" placeholder="ejemplo@ejemplo.com" name="correo" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Sitio WEB</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" maxlength=50 class="form-control" placeholder="www.misitio.com" name="correo" value="">
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
                        <select id="provincias" readonly class="form-control" onchange="buscarDistrito(this.value);">
                            <option value="">Seleccione Provincia</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Distrito</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select id="distritos" readonly class="form-control" name="distrito">
                            <option value="2078">Seleccione Distrito</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Direccion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" maxlength=50 class="form-control" placeholder="Direccion" name="direccion" value="">
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
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem">ACEPTAR</button>
                <a type="button" href="/compra/proveedor" class="btn btn-default">CANCELAR</a>
            </div>

        </form>
    </div>


@endsection
@endsection