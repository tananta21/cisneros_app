@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/venta/nuevaventa">Nueva Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/venta/lista">Lista Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/venta/cliente">Clientes</a>
            </li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $("#modulo-venta").addClass('active');
        });
    </script>
@section('contenido_modulos')

    {{--<div class="col-lg-12" style="padding-top:2rem">--}}
        {{--<div class="col-lg-6" style=" text-align: start; background-color:#1ab394;padding-top: 3.4rem;padding-bottom: 4.5rem">--}}
            {{--<span style="color:white;font-weight: bold;font-size: 2rem"><i class="fa fa-calendar" style="font-size:2.5rem;padding-right: .5rem"></i>Informe de Ventas</span>--}}
        {{--</div>--}}
        {{--<div class="col-lg-6" style=" text-align:end;background-color:#1ab394;padding-top: 2.3rem;padding-bottom: 2.3rem">--}}
            {{--<div class="col-lg-2">--}}
                {{--<span style="color:white;font-weight: bold;font-size: 1.3rem"><i class="fa fa-print" style="font-size:2.5rem;padding-right: .5rem"></i></span>--}}
                {{--<h5>imprimir</h5>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2">--}}
                {{--<span style="color:white;font-weight: bold;font-size: 1.3rem"><i class="fa fa-file-pdf-o" style="font-size:2.5rem;padding-right: .5rem"></i></span>--}}
                {{--<h5>Pdf</h5>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2">--}}
                {{--<span style="color:white;font-weight: bold;font-size: 1.3rem"><i class="fa fa-question-circle" style="font-size:2.5rem;padding-right: .5rem"></i></span>--}}
                {{--<h5>Ayuda</h5>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="col-lg-12" style="padding-top:1.3rem">
        <form class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">Desde:</label>
                <input type="date" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Hasta:</label>
                <input type="date" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            <button type="submit" class="btn btn-default">Restablecer</button>
        </form>
    </div>
    <div class="col-lg-12" style="padding-top: 2rem">
        <div class="ibox-content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>EMPLEADO</th>
                    <th>DOCUMENTO</th>
                    <th>NUMERO</th>
                    <th>ESTADO</th>
                    <th>TOTAL</th>
                    <th>ID</th>
                    <th>VER</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><i class="fa fa-search"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>

@endsection
@endsection
