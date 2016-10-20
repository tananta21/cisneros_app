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

        <div class="col-lg-7">
            {!! Form::model(Request::all(),['route'=>'buscar.proveedor','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="col-lg-2">
                <span style="font-size: 1.5rem">Estado Proveedor</span>
            </div>
            <div class="col-lg-4">
                {!!form::select('estado',[
                '1'=>'Activo',
                '0'=>'Inactivo'],null,['class'=>'form-control'])!!}
            </div>

            <div class="col-lg-1">
                <button type="submit" class="btn btn-primary"  >Buscar <i class="fa fa-search"></i></button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-lg-5">
            <a data-toggle="modal" href="/compra/nuevoproveedor" style="font-size: 1.6rem">
                <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i> <span style="color: #000000">Agregar Proveedor</span>
            </a>
        </div>
    </div>

    <div class="box-body table-responsive no-padding col-lg-12">
        <script>
            $(document).ready(function() {
                        $('#example').DataTable( {
                            "lengthChange": false,
                            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
                            "order": [[ 0, "desc" ]],
                            "language": {
                                "sSearch": "<span style='font-size: 1.5rem'>Buscar Registro</span>",
                                "lengthMenu": "Mostrar _MENU_ resultados",
                                "emptyTable":     "No se encontraron resultados",
                                "info":           "Se Muestran _START_ a _END_ de _TOTAL_ resultados",
                                "infoEmpty":      "Se muestran 0 resultados",
                                "paginate": {
                                    "first":      "Primero",
                                    "last":       "Ultimo",
                                    "next":       "Siguiente",
                                    "previous":   "Anterior"
                                }
                            }
                        });
                    }
            );
        </script>
            <table id="example" class=" table table-hover display" cellspacing="0" width="100%">
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

