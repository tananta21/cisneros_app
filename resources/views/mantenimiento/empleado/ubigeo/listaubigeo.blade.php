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
            $("#modulo-mantenimiento").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <div class="col-lg-12">
            <div class="col-lg-10">
                <h3 class="col-lg-4" style="margin-bottom: 0.5rem;padding-left: 0">Lista Ubigeos</h3>
            </div>

        </div>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-12" style="margin-top: 0.5rem">

            {!! Form::model(Request::all(),['route'=>'buscar.ubigeo','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="box-body">
                <div class=" form-group">
                    <div class="col-lg-12">
                        <div  {{--style="padding-left: 0rem"--}} class="col-lg-10">
                            <button type="submit" class="btn btn-primary btn-sm col-lg-1"> Buscar
                                <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                            </button>
                            <div class="col-lg-3 col-sm-2">
                                {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                                {!!form::text('cliente',null,['class'=>'form-control', 'placeholder'=>'Ingrese N° de Ubigeo','required'=>'true'])!!}
                            </div>
                            <div class="col-lg-1 col-sm-2">
                                <a type="button" href="/mantenimiento/ubigeo" class="btn btn-default" > <i class="fa fa-refresh fa-1x"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="box-body table-responsive no-padding col-lg-12">
        <table class="table table-hover">
            <thead>
            <tr >
                <th>N° ID</th>
                <th>N° UBIGEO</th>
                <th>DEPARTAMENTO</th>
                <th>PROVINCIA</th>
                <th>DISTRITO</th>
                <th>ESTADO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ubigeos as $ubigeo)
                <tr data-id="{{$ubigeo->id}}" id="filaproducto{{$ubigeo->id}}">
                    <td>{{$ubigeo->id}}</td>
                    <td>{{$ubigeo->numubigeo}}</td>
                    <td>{{$ubigeo->departamento}}</td>
                    <td>{{$ubigeo->provincia}}</td>
                    <td>{{$ubigeo->distrito}}</td>
                    <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $ubigeos->appends(Request::all())->render() !!}
    </div>

@endsection
@endsection
