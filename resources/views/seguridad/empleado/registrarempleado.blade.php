@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    <script>
        $(document).ready(function () {
            $("#modulo-seguridad").addClass('active');
        });
    </script>

@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Empleado</h4>
    <hr class="col-lg-12 linea-titulo" size="2px" color="green"/>

    <div >
        <form method="POST" action="/seguridad/empleado/registro" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}
            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Tipo Empleado</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_empleado">
                            <option value="1" selected> Seleccione Tipo Empleado</option>
                            @foreach($tipoEmpleados as $tipoEmpleado)
                                <option value="{{$tipoEmpleado->id}}">{{$tipoEmpleado->descripcion}}</option>
                            @endforeach
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
            </div>


            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombres del Empleado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Nombre Cliente" name="nombre" value="">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Apellidos del Empleado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Apallido Cliente" name="apellido" value="">
                    </div>
                </div>

            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="email"  maxlength=50 class="form-control" placeholder="ejemplo@ejemplo.com" name="correo" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Contraseña de Usuario</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="password"  maxlength=50 class="form-control" placeholder="Contraseña" name="password" >
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
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Direccion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" maxlength="60"class="form-control" placeholder="Direccion" name="direccion" value="">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">

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
                    <h5 class="col-lg-12 titulos">Numero de Hijos</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="number" class="form-control"  maxlength="2"placeholder="Numero de hijos" name="numero_hijos" value="">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nivel Salarial</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="sueldo_cliente">
                            <option value="1">0-1000</option>
                            <option value="2">1000-2000</option>
                            <option value="1">2000-3000</option>
                            <option value="2">3000-4000</option>
                            <option value="2">4000-5000</option>
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
                            <option value="2080">Seleccione Distrito</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Fecha de nacimiento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="date" class="form-control" placeholder="fecha nacimiento" name="fecha_nacimiento" value="">
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
                <a type="button" href="/seguridad/empleado" class="btn btn-default" >CANCELAR</a>
            </div>

        </form>
    </div>
@endsection
@endsection
