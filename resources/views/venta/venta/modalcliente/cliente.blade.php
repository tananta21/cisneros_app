{{--registrar cliente--}}

<div class="modal fade" id="registrar_cliente" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar cliente</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="/venta/cliente/registro" id="registrarcliente" onsubmit="return false" accept-charset="UTF-8" class="form-horizontal" role="form">
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
                                <input id="hombre"  type="radio"  name="sexo" value="1" checked> <label style="cursor: pointer" for="hombre"> Hombre </label>
                                <input id="mujer" type="radio" name="sexo" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="mujer"> Mujer </label>
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
                                <select id="estadocivil" class="form-control" name="estado_civil">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Grado de instruccion</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select id="gradoinstruccion" class="form-control" name="grado_instruccion">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Ocupacion</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select id="ocupacion" class="form-control" name="ocupacion">
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-12 caja_formulario">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Numero de Hijos</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control"  maxlength="2"placeholder="Numero de hijos" name="numero_hijos" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
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
                                <select id="departamentos" class="form-control"  onchange="buscarProvincia(this.value);">
                                    <option value="0">Seleccione Departamento</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Provincia</h5>
                            <div  class="col-lg-12 col-sm-12  col-xs-12">
                                <select id="provincias"  readonly class="form-control re_provincias" onchange="buscarDistrito(this.value);">
                                    <option value="">Seleccione Provincia</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Distrito</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select id="distritos" readonly class="form-control re_distritos" name="distrito">
                                    <option value="2080">Seleccione Distrito</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 caja_formulario">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Fecha de nacimiento</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input onchange="calcularEdad()" id="fecha_cumple" type="date" class="form-control" placeholder="fecha nacimiento" name="fecha_nacimiento" value="">
                            </div>
                        </div>
                        <div id="caja_edad" class="col-lg-4 col-sm-12 col-xs-12" style="display: none">
                            <h5 class="col-lg-12 titulos">Edad Cliente</h5>
                            <div  id="result" class="col-lg-12 col-sm-12 col-xs-12">
                                <span style="font-size: 2.5rem" id="edad_cliente" class="fom-control"></span> AÑOS
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                        <button type="submit" class="btn btn-primary" style="margin-right: 1rem">GUARDAR</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>








{{--editar datos del cliente--}}
<div class="modal fade" id="actualizar_cliente" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">actualizar cliente</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="formactualizarcliente" action="/venta/cliente/actualizar/" onsubmit="return false;" accept-charset="UTF-8" class="form-horizontal" role="form">
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
                    <input type="hidden" id="id_cliente" name="id_cliente"/>

                    <div class="col-lg-12 caja_formulario ">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Numero de documento</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input id="edit_nro_documento" required="true" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
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
                                <input id="edit_nombres" type="text" onkeypress="return soloLetras(event)"  maxlength=50 class="form-control" placeholder="Nombre Cliente" name="nombres" value="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Apellidos del Cliente</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input id="edit_apellidos" type="text" onkeypress="return soloLetras(event)"   maxlength=50 class="form-control" placeholder="Apallido Cliente" name="apellidos" value="">
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12 caja_formulario">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Telefono</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input id="edit_telefono" type="tetx" class="form-control"  placeholder="nº de telefono" name="telefono" value="" maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Correo Electronico</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input id="edit_correo" type="email" class="form-control" maxlength="50"placeholder="ejemplo@ejemplo.com" name="correo" value="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Direccion</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input id="edit_direccion" type="text" class="form-control"  maxlength="60" placeholder="Direccion" name="direccion" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 caja_formulario">

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Estado Civil</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select class="form-control estadocivil" name="estado_civil">

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Grado de instruccion</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select class="form-control gradoinstruccion" name="grado_instruccion">

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Ocupacion</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select class="form-control ocupacion" name="ocupacion">

                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-12 caja_formulario">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Numero de Hijos</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control"  maxlength="2"placeholder="Numero de hijos" name="numero_hijos" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
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
                                <select class="form-control departamentos"  onchange="buscarProvincia(this.value);">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Provincia</h5>
                            <div  class="col-lg-12 col-sm-12  col-xs-12">
                                <select readonly class="form-control edit_provincias" onchange="buscarDistrito(this.value);">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Distrito</h5>
                            <div class="col-lg-12 col-sm-12  col-xs-12">
                                <select readonly class="form-control edit_distritos" name="distrito">
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 caja_formulario">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <h5 class="col-lg-12 titulos">Fecha de nacimiento</h5>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <input onchange="calcularEdad()" id="fecha_cumple" type="date" class="form-control fecha-nacimiento" placeholder="fecha nacimiento" name="fecha_nacimiento" value="">
                            </div>
                        </div>
                        <div id="caja_edad" class="col-lg-4 col-sm-12 col-xs-12" style="display: none">
                            <h5 class="col-lg-12 titulos">Edad Cliente</h5>
                            <div  id="result" class="col-lg-12 col-sm-12 col-xs-12">
                                <span style="font-size: 2.5rem" id="edad_cliente" class="fom-control"></span> AÑOS
                            </div>
                        </div>
                    </div>




                    {{--<script>--}}
                        {{--function calcularEdad() {--}}
{{--//                    console.log($('#fecha_nacimiento').val())--}}
                            {{--var date= $('#fecha_cumple').val().split('-');--}}
                            {{--var year= date[0];--}}
                            {{--var año_actual= new Date();--}}
                            {{--var año=año_actual.getFullYear();--}}
                            {{--var edad=año - year;--}}
{{--//                    console.log(edad);--}}
                            {{--$("#caja_edad").css("display","block")--}}
                            {{--$("#edad_cliente").text(edad);--}}
                        {{--}--}}
                    {{--</script>--}}


                    <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                        <button type="submit" class="btn btn-primary" style="margin-right: 1rem">ACTUALIZAR</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>