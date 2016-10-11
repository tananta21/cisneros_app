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

    <div id="lista_cliente">
        <div class="col-lg-12">
           <div class="col-lg-10">
               <h3 class="col-lg-4" style="margin-bottom: 0.5rem;padding-left: 0">Lista Clientes</h3>
           </div>

        </div>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-12" style="margin-top: 0.5rem">
            {!! Form::model(Request::all(),['route'=>'buscar.producto','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}

            <div class="box-body">
                <div class=" form-group">
                    <div class="col-lg-12">
                        <div  style="padding-left: 0" class="col-lg-10">
                            <button type="submit" class="btn btn-primary btn-sm col-lg-1"> Buscar
                                <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                            </button>
                            <div class="col-lg-6 col-sm-2">
                                {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                                {!!form::text(' cliente',null,['class'=>'form-control', 'placeholder'=>'buscar'])!!}
                            </div>
                        </div>
                        <div class="col-lg-2">

                            <a href="/venta/cliente/nuevocliente" onclick="registrarCliente()" type="button" class="btn btn-primary btn-sm"> NUEVO CLIENTE
                            <i class="fa fa-plus-square fa-1px"></i>
                            </a>
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
                    <th>DOCUMENTO</th>
                    <th>NOMBRES</th>
                    <th>APELIDOS</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    {{--<th>DIRECCION</th>--}}
                    <th>ESTADO</th>
                    <th>ACCION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr data-id="{{$cliente->id}}" id="filaproducto{{$cliente->id}}">
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nro_documento}}</td>
                        <td>{{$cliente->nombres}}</td>
                        <td>{{$cliente->apellidos}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->correo}}</td>
                        {{--<td>{{$cliente->direccion}}</td>--}}
                        @if($cliente->estado == 1)
                            <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                        @endif
                        <td>
                            <a href="/venta/cliente/editar/{{$cliente->id}}" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $clientes->appends(Request::all())->render() !!}
    </div>

@endsection
@endsection
