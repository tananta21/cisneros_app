@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/seguridad/empleado">Empleados</a>
            </li>
        </ul>
    </div>

    <script>
        $(document).ready(function () {
            $("#modulo-seguridad").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <h3 class="col-lg-3" style="margin-bottom: 0.5rem">Lista Empleados</h3>

        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-12" style="margin-top: 0.5rem">
            {!! Form::model(Request::all(),['route'=>'buscar.empleado','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="box-body">
                <div class=" form-group">
                    <div class="col-lg-12">
                        <div  style="padding-left: 0" class="col-lg-10">
                            <button type="submit" class="btn btn-primary btn-sm col-lg-1"> Buscar
                                <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                            </button>
                            <div class="col-lg-6 col-sm-2">
                                {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                                {!!form::text('cliente',null,['class'=>'form-control', 'placeholder'=>'buscar'])!!}
                            </div>
                            <div class="col-lg-1 col-sm-2">
                                <a type="button" href="/seguridad/empleado" class="btn btn-default" > <i class="fa fa-refresh fa-1x"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a href="/seguridad/nuevoempleado"  type="button" class="btn btn-primary btn-sm"> NUEVO EMPLEADO
                            <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        {{--<div class="col-lg-3" style="margin-bottom: 3rem">--}}
            {{--<a href="/seguridad/nuevoempleado"  type="button" class="btn btn-primary btn-sm"> NUEVO EMPLEADO--}}
                {{--<i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
        <div class="box-body table-responsive no-padding col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N° ID</th>
                        <th>TIPO</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>TELEFONO</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($empleados as $empleado)
                    <tr data-id="{{$empleado->id}}" id="filaproducto{{$empleado->id}}">
                        <td>{{$empleado->id}}</td>
                        <td>{{$empleado->tipoEmpleado->descripcion}}</td>
                        <td>{{$empleado->nro_documento}}</td>
                        <td>{{$empleado->name}}</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->telefono}}</td>
                        @if($empleado->estado == 1)
                            <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                        @else
                            <td><i class="fa fa-check-circle-o " style="color: red"></i></td>
                        @endif
                        @if($empleado->estado == 1)
                            <td>
                                <a onclick="eliminarCategoria('{{$empleado->id}}')" style="font-size: 2rem; padding: 0.5rem; color: red; cursor: pointer; margin-right: 2rem">
                                    <input type="hidden" name="eliminarmarca{{$empleado->id}}" value="{{$empleado->id}}"/>
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="/seguridad/empleado/editar/{{$empleado->id}}" style="color: green;  font-size: 2rem; padding: 0.5rem">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        @else
                            <td>
                                <a href="/seguridad/empleado/editar/{{$empleado->id}}" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $empleados->appends(Request::all())->render() !!}
    </div>

@endsection
@endsection
