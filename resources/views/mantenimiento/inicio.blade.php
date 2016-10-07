@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/mantenimiento/principal">Menu Mantenimiento</a>
                </li>
            </ul>
        </div>
        <div class="text-center" style="padding-top:.1rem; margin-top: 0">
            <h3 style="font-weight: bold">BIENVENIDOS A MANTENIMIENTOS</h3>
        </div>
        <br>
        <div style="text-align:center" class=" col-md-12">
                <figure>
                    <img style=";width: 135px;height: 130px" src="{{url('/')}}/dist/img/mantenimiento.jpg">
                </figure>
            <hr style="height: .5px ; background-color: green; width: 50%"/>
        </div>

        <section class="col-lg-12" style=" padding-top:1rem;padding-bottom: 25rem; text-align: center">
            <div class="dropdown col-lg-4" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Mant. para Productos</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu0">
                    <li><a href="/mantenimiento/tipoproducto">tipo producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/categoria">Categorias</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/marca">Marcas</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/modelo">Modelos</a></li>
                </ul>
            </div>
            <div class="dropdown col-lg-4" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Mant. para Empleados y Clientes</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/mantenimiento/tipoempleado">Tipo Empleados</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/estadocivil">Estado Civil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/gradoinstruccion">Grado Instruccion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/ocupacion">Ocupacion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/tipocliente">Tipo Cliente</a></li>

                </ul>
            </div>
            <div class="dropdown col-lg-4" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Mant. para Compras y Ventas</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="/mantenimiento/tipotransaccion">Tipo Transaccion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/tipocomprobante">Tipo Comprobante</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/tipopago">Tipo Pagos</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/tipomovimiento">Tipo Movimiento</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/mantenimiento/conceptomovimiento">Concepto Movimiento</a></li>

                </ul>
            </div>
        </section>
@endsection



