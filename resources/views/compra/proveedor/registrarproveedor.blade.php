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
                    <h5 class="col-lg-12 titulos">Numero de documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                               type="text" class="form-control" placeholder="DNI O RUC" name="nro_documento" value="">
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
                        <input type="text" class="form-control" placeholder="Encargado" name="encargado" value="">
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
                    <h5 class="col-lg-12 titulos">DATOS UBICACION</h5>
                    <hr class="col-lg-4 linea-titulo" size="2px"  style="margin-bottom: 0rem" color="green"/>
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

            <script>
                function buscarProvincia(id){
                    if(id !=0 ){
                        $("#provincias").removeAttr('disabled');
                        $("#provincias").empty();
                        $("#distritos").empty();
                        $("#distritos").append('<option value="0">Seleccione Distrito</option>');
                        var nro_ubigeo = id.substr(0,3)
                        var url = '{{route("buscar.provincia")}}';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                ubigeo : nro_ubigeo
                            },
                            dataType: 'JSON',
//
                            error: function() {
                                $("#respuesta").html('<div> Ha surgido un error. </div>');
                            },
                            success: function(respuesta){
                                for(var i in respuesta){
                                    if(respuesta[i].provincia == ''){
                                        $("#provincias").append('<option value="0">Seleccione Provincia</option>');
                                    }
                                    else{
                                        $('#provincias').append('<option value="'+respuesta[i].numubigeo+'">'+respuesta[i].provincia+'</option>');
                                    }
                                }
                            }
                        });


                    }
                    else{
                        $("#provincias").attr('disabled','true');
                        $("#provincias").empty();
                        $("#provincias").append('<option value="0">Seleccione Provincia</option>');
                        $("#distritos").attr('disabled','true');
                        $("#distritos").empty();
                        $("#distritos").append('<option value="0">Seleccione Distrito</option>');

                    }
                }

                function buscarDistrito(id){
                    if(id !=0 ){
                        $("#distritos").removeAttr('disabled');
                        $("#distritos").empty();
                        var nro_ubigeo = id.substr(0,4)
                        var url = '{{route("buscar.distrito")}}';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                ubigeo : nro_ubigeo
                            },
                            dataType: 'JSON',
//
                            error: function() {
                                $("#respuesta").html('<div> Ha surgido un error. </div>');
                            },
                            success: function(respuesta){
                                for(var i in respuesta){
                                    if(respuesta[i].distrito == ''){
                                        $("#distritos").append('<option value="'+respuesta[i].numubigeo+'">Seleccione Distrito</option>');
                                    }
                                    else{
                                        $('#distritos').append('<option value="'+respuesta[i].numubigeo+'">'+respuesta[i].distrito+'</option>');
                                    }
                                }
                            }
                        });


                    }
                    else{
                        $("#distritos").attr('disabled','true');
                        $("#distritos").empty();
                        $("#distritos").append('<option value="0">Seleccione Distrito</option>');

                    }
                }
            </script>

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