@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    <script>
        $(document).ready(function () {
            $("#modulo-venta").addClass('active');
        });
    </script>

@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Cliente</h4>
    <hr class="col-lg-12 linea-titulo" size="2px" color="green"/>

    <div >
        <form method="POST" action="/venta/cliente/registro" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}
            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Tipo Cliente</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_cliente">
                            <option value="1">Natural</option>
                            <option value="2">Juridica</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero de documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                               type="text" class="form-control" placeholder="DNI O RUC" name="nro_documento" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Sexo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input id="hombre"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="hombre"> Hombre </label>
                        <input id="mujer" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="mujer"> Mujer </label>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre del Cliente</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Nombre Cliente" name="nombres" value="">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Apellidos del Cliente</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"   maxlength=50 class="form-control" placeholder="Apallido Cliente" name="apellidos" value="">
                    </div>
                </div>

            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Telefono</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="tetx" class="form-control"  placeholder="nº de telefono" name="telefono" value="" maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="email" class="form-control" maxlength="50"placeholder="ejemplo@ejemplo.com" name="correo" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Direccion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control"  maxlength="60" placeholder="Direccion" name="direccion" value="">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado Civil</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="estado_civil">
                            @foreach($estadoCiviles as $estadoCivil)
                                @if($estadoCivil->id == 1)
                                    <option value="1" selected> Seleccione Estado Civil</option>
                                @else
                                    <option value="{{$estadoCivil->id}}">{{$estadoCivil->descripcion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Grado de instruccion</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="grado_instruccion">
                            @foreach($gradoInstrucciones as $grado)
                                @if($grado->id == 1)
                                    <option value="1" selected> Seleccione Grado Instruccion</option>
                                @else
                                    <option value="{{$grado->id}}">{{$grado->descripcion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Ocupacion</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="ocupacion">
                            @foreach($ocupaciones as $ocupacion)
                                @if($ocupacion->id == 1)
                                    <option value="1" selected> Seleccione Ocupacion</option>
                                @else
                                <option value="{{$ocupacion->id}}">{{$ocupacion->descripcion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>



            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero de Hijos</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="number" class="form-control"  maxlength="2"placeholder="Numero de hijos" name="numero_hijos" value="">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nivel Salarial</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="sueldo_cliente">
                            <option value="0">seleccione una opcion</option>
                            <option value="1">0-1000</option>
                            <option value="2">1000-2000</option>
                            <option value="3">2000-3000</option>
                            <option value="4">3000-4000</option>
                            <option value="5">4000-5000</option>
                        </select>
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
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Fecha de nacimiento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input onchange="calcularEdad()" id="fecha_nacimiento" type="date" class="form-control" placeholder="fecha nacimiento" name="user_date" value="">
                    </div>
                </div>
                <div id="caja_edad" class="col-lg-4 col-sm-12 col-xs-12" style="display: none">
                    <h5 class="col-lg-12 titulos">Edad</h5>
                    <div  id="result" class="col-lg-12 col-sm-12 col-xs-12">
                        <span style="font-size: 2.5rem" id="edad_cliente" class="fom-control"></span> AÑOS
                    </div>
                </div>
            </div>


            <script>
                function calcularEdad() {
//                    console.log($('#fecha_nacimiento').val())
                    var date= $('#fecha_nacimiento').val().split('-');
                    var year= date[0];
                    var año_actual= new Date();
                    var año=año_actual.getFullYear();
                    var edad=año - year;
//                    console.log(edad);
                    $("#caja_edad").css("display","block")
                    $("#edad_cliente").text(edad);
                }
            </script>


            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem">ACEPTAR</button>
                <a type="button" href="/venta/cliente" class="btn btn-default" >CANCELAR</a>
            </div>

        </form>
    </div>

    {{------------------------funcion calcular edad---------------------------}}



@endsection
@endsection
