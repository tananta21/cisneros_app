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
                        <input id="user_date" type="date" class="form-control" placeholder="fecha nacimiento" name="user_date" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Edad</h5>
                    <div  id="result" class="col-lg-12 col-sm-12 col-xs-12">
                        <input id="result" type="text" class="form-control" placeholder="edad" name="edad" value="">
                    </div>
                </div>
                <div class="col-lg-1" style="padding-top: 3.5rem">
                    <button  type="reset" class="btn btn-primary" onclick="javascript:calcularEdad();">Calcular</button>
                </div>
            </div>



            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem">ACEPTAR</button>
                <a type="button" href="/venta/cliente" class="btn btn-default" >CANCELAR</a>
            </div>

        </form>
    </div>

    {{------------------------funcion calcular edad---------------------------}}
    <script>
        /**
         * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
         * Tiene que recibir el dia, mes y año
         */
        function isValidDate(day,month,year)
        {
            var dteDate;
            month=month-1;
            dteDate=new Date(year,month,day);

            //Devuelva true o false...
            return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
        }

        /**
         * Funcion para validar una fecha
         * Tiene que recibir:
         *  La fecha en formato ingles yyyy-mm-dd
         * Devuelve:
         *  true-Fecha correcta
         *  false-Fecha Incorrecta
         */
        function validate_fecha(fecha)
        {
            var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");

            if(fecha.search(patron)==0)
            {
                var values=fecha.split("-");
                if(isValidDate(values[2],values[1],values[0]))
                {
                    return true;
                }
            }
            return false;
        }

        /**
         * Esta función calcula la edad de una persona y los meses
         * La fecha la tiene que tener el formato yyyy-mm-dd que es
         * metodo que por defecto lo devuelve el <input type="date">
         */
        function calcularEdad()
        {
            var fecha=document.getElementById("user_date").value;
            if(validate_fecha(fecha)==true)
            {
                // Si la fecha es correcta, calculamos la edad
                var values=fecha.split("-");
                var dia = values[2];
                var mes = values[1];
                var ano = values[0];

                // cogemos los valores actuales
                var fecha_hoy = new Date();
                var ahora_ano = fecha_hoy.getYear();
                var ahora_mes = fecha_hoy.getMonth()+1;
                var ahora_dia = fecha_hoy.getDate();

                // realizamos el calculo
                var edad = (ahora_ano + 1900) - ano;
                if ( ahora_mes < mes )
                {
                    edad--;
                }
                if ((mes == ahora_mes) && (ahora_dia < dia))
                {
                    edad--;
                }
                if (edad > 1900)
                {
                    edad -= 1900;
                }

                // calculamos los meses
                var meses=0;
                if(ahora_mes>mes)
                    meses=ahora_mes-mes;
                if(ahora_mes<mes)
                    meses=12-(mes-ahora_mes);
                if(ahora_mes==mes && dia>ahora_dia)
                    meses=11;

                // calculamos los dias
                var dias=0;
                if(ahora_dia>dia)
                    dias=ahora_dia-dia;
                if(ahora_dia<dia)
                {
                    ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
                    dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
                }

                document.getElementById("result").innerHTML=edad;
            }else{
                document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
            }
        }


    </script>


@endsection
@endsection
