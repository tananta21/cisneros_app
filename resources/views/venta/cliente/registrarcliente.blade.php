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
        <form method="POST" action="/inventario/producto/registro" accept-charset="UTF-8" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="xZJGIpm4zdd2dLOTceSvFryNxJzLjRe0YO3fszy1">

            <div class="col-lg-12 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Tipo Cliente</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto">
                            <option value="1">Natural</option>
                            <option value="2">Juridica</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Estado Civil</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Grado de instruccion</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto">
                            <option value="1">primaria</option>
                            <option value="2">secundaria</option>
                            <option value="3">superior</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12">Ocupacion</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto">
                            <option value="1">Docente</option>
                            <option value="2">Estidiante</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Numero de documento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" type="text" class="form-control" placeholder="DNI" name="serie" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre del Cliente</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nombre Cliente" name="nombre" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Apellido del Cliente</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Apallido Cliente" name="apellido" value="">
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
                    <h5 class="col-lg-12 titulos">Correo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="coreo electronico" name="correo" value="">
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
                    <h5 class="col-lg-12 titulos">Fecha de nacimiento</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="date" class="form-control" placeholder="fecha nacimiento" name="cumpleaños" value="">
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