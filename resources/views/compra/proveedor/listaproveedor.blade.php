@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/compra/compranueva">Nueva Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lista Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/compra/proveedor">Proveedor</a>
            </li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $("#modulo-compra").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <h3 class="col-lg-3" style="margin-bottom: 0.5rem">Lista Proveedores</h3>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-3" style="margin-bottom: 3rem">
            <a href="/compra/nuevoproveedor" {{--onclick="registrarCliente()"--}} type="button" class="btn btn-primary btn-sm"> NUEVO PROVEEDOR
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>
        <div class="box-body table-responsive no-padding col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N° ID</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>ENCARGADO</th>
                        <th>DIRECCION</th>
                        {{--<th>CORREO</th>--}}
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedor)
                    <tr data-id="{{$proveedor->id}}" id="filaproducto{{$proveedor->id}}">
                        <td>{{$proveedor->id}}</td>
                        <td>{{$proveedor->nro_documento}}</td>
                        <td>{{$proveedor->nombre}}</td>
                        <td>{{$proveedor->telefono}}</td>
                        <td>{{$proveedor->encargado}}</td>
                        <td>{{$proveedor->direccion}}</td>
                        {{--<td>{{$proveedor->correo}}</td>--}}

                        @if($proveedor->estado == 1)
                            <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                            @else
                            <td><i class="fa fa-check-circle-o " style="color: red"></i></td>
                        @endif
                        @if($proveedor->estado == 1)
                            <td>
                                <a onclick="eliminarCategoria('{{$proveedor->id}}')" style="font-size: 2rem; padding: 0.5rem; color: red; cursor: pointer; margin-right: 2rem">
                                    <input type="hidden" name="eliminarmarca{{$proveedor->id}}" value="{{$proveedor->id}}"/>
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="/compra/proveedor/editar/{{$proveedor->id}}" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            @else
                            <td>
                                <a href="/compra/proveedor/editar/{{$proveedor->id}}" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
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
        {!! $proveedores->appends(Request::all())->render() !!}
    </div>

@endsection
@endsection
