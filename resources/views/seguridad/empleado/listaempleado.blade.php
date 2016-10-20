@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <script>
        $(document).ready(function () {
            $("#modulo-seguridad").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <h3 class="col-lg-3" style="margin-bottom: 0.5rem">Gestor de Empleados</h3>

        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

        <div class="col-lg-6">
            {!! Form::model(Request::all(),['route'=>'buscar.empleado','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="col-lg-2">
                <span style="font-size: 1.5rem">Estado Empleado</span>
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
        <div class="col-lg-4">
            <a data-toggle="modal"  href="/seguridad/nuevoempleado" style="font-size: 1.6rem">
                <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i> <span style="color: #000000">Agregar Empleado</span>
            </a>
        </div>
        <div class="box-body table-responsive no-padding col-lg-12">
            <script>
                $(document).ready(function() {
                            $('#example').DataTable( {
                                "lengthChange": false,
                                "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
                                "order": [[ 0, "desc" ]],
                                "language": {
                                    "sSearch": "<span style='font-size: 1.5rem'>Buscar Empleado</span>",
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
            <table id="example" class="table table-hover">
                <thead>
                <tr>
                    <th>N° ID</th>
                    <th>PERFIL</th>
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
                        <td><span id="empleado{{$empleado->id}}">{{$empleado->name}}</span></td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->telefono}}</td>
                        @if($empleado->estado == 1)
                            <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                        @else
                            <td><i class="fa fa-check-circle-o " style="color: red"></i></td>
                        @endif
                        @if($empleado->estado == 1)
                            <td>
                                <a  onclick="eliminar('{{$empleado->id}}')"  {{--onclick="eliminarCategoria('{{$empleado->id}}')"--}} style="font-size: 2rem; padding: 0.5rem; color: red; cursor: pointer; margin-right: 2rem">
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

    <script>
        function eliminar(id) {
            $(document).ready(function(){
                var texto = $("#empleado"+id).text();
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
                var url = '{{route("eliminar.empleado")}}';
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
                        $("#filaproducto"+id).remove();;
                    }
                });
            });
        };
    </script>

@endsection
@endsection