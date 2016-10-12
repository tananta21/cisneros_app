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
        <div class="col-lg-12">
            <div class="col-lg-10">
                <h3 class="col-lg-4" style="margin-bottom: 0.5rem;padding-left: 0">Lista Proveedores</h3>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

        <div class="col-lg-12" style="margin-top: 0.5rem">
            {!! Form::model(Request::all(),['route'=>'buscar.proveedor','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="box-body">
                <div class=" form-group">
                    <div class="col-lg-12">
                        <div  style="padding-left: 0" class="col-lg-10">
                            <div class="col-lg-2 col-sm-2" >
                                <a type="button" href="/compra/proveedor" class="btn btn-default" >Refresh <i class="fa fa-refresh fa-1x"></i></a>
                            </div>
                            <div class="col-lg-6 col-sm-2">
                                {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                                {!!form::text('cliente',null,['class'=>'form-control', 'placeholder'=>'buscar'])!!}
                            </div>
                            <div class="col-lg-2">
                                {!!form::select('estado',[
                                '1'=>'Activo',
                                '0'=>'Inactivo'],null,['class'=>'form-control'])!!}
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm col-lg-1"> Buscar
                                <i class="fa fa-search fa-1px" ></i>
                            </button>
                        </div>

                        <div class="col-lg-2">
                          <a href="/compra/nuevoproveedor"  type="button" class="btn btn-primary btn-sm"> NUEVO PROVEEDOR
                            <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
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
                    <tr style="font-size: 1.4rem" data-id="{{$proveedor->id}}" id="filaproducto{{$proveedor->id}}">
                        <td>{{$proveedor->id}}</td>
                        <td>{{$proveedor->nro_documento}}</td>
                        <td><span id="texto{{$proveedor->id}}">{{$proveedor->nombre}}</span></td>
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
                                <a onclick="eliminar('{{$proveedor->id}}')"  {{--onclick="eliminarCategoria('{{$proveedor->id}}')"--}} style="font-size: 2rem; padding: 0.5rem; color: red; cursor: pointer; margin-right: 2rem">
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

    <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $proveedores->appends(Request::all())->render() !!}
    </div>

    <script>
        function eliminar(id) {

        $(document).ready(function(){
            var texto = $("#texto"+id).text();
            $("#texto_eliminar").text(texto);
            $("#confirmar").attr('onclick','eliminarCategoria('+id+')');
            $("#drop_porveedor").modal('show');
        });
        }
    </script>

    {{--javascript eliminar: cambiar de estado--}}
    <script type="text/javascript">
        function eliminarCategoria(id){
                $(document).ready(function(){
                    var id_marca = $(this).find( 'input[name="eliminarmarca'+id+'"]' ).val();
                    var url = '{{route("eliminar.proveedor")}}';
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            id: id_marca
                        },
                        dataType: 'JSON',

                        error: function() {
                            $("#respuesta").html('<div> Ha surgido un error. </div>');
                        },

                        success: function(){
                            $("#filaproducto"+id).remove();
                        }
                    });
                });
        };
    </script>


@endsection
@endsection

<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="drop_porveedor" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div  style="text-align: center">
                    <h2 style="color: red" class="modal-title">Advertencia</h2>
                </div>
                <div class="modal-body">
                    {{--formulario crear --}}
                    <div class="box box-primary" style="border-top-color: red;">
                            <P style="text-align: center;padding-top: 1rem;font-size:2rem">
                                Esta seguro de eliminar a <span  style="font-weight: bold" id="texto_eliminar"></span>
                            </P>
                    </div>

                    <div class="box-footer" style="text-align: center">
                        {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                        <button  id="confirmar"  style="background: red;border: none;" class="btn btn-info" data-dismiss="modal" >Eliminar</button>
                        <button style="background-color:#a9a9a9;border:none " href="" class="btn btn-info" data-dismiss="modal" >Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>