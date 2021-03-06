@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    <h3 class="col-lg-12" style="margin-bottom: 0.5rem"> Gestor de Categorias</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
    <div class="col-lg-7">
        {!! Form::model(Request::all(),['route'=>'buscar.categoria','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
           <div class="col-lg-2">
               <span style="font-size: 1.5rem">Estado Categoria</span>
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
        <a data-toggle="modal" data-target="#categoria_modal" href="#" style="font-size: 1.6rem">
            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i> <span style="color: #000000">Agregar Categoria</span>
        </a>
    </div>

    <div class="col-lg-12" style="margin-top: 3rem">
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
     <div class="box-body table-responsive no-padding col-lg-12">
         <table id="example" class=" table table-hover display" cellspacing="0" width="100%">
             <thead>
             <tr>
                 <th>N° ID</th>
                 <th>DESCRIPCION CATEGORIA</th>
                 <th>ESTADO</th>
                 <th>ACCIONES</th>
             </tr>
             </thead>
             <tbody>
             @foreach($categorias as $categoria)
                 <tr data-id="{{$categoria->id}}" id="filaproducto{{$categoria->id}}">
                     <td>{{$categoria->id}}</td>
                     <td><span id="texto{{$categoria->id}}">{{$categoria->descripcion}}</span></td>
                     @if($categoria->estado == 1)
                         <td>Activo <i class="fa fa-check-circle-o " style="color: green"></i></td>
                     @else
                         <td>Inactivo <i class="fa fa-check-circle-o " style="color: orange"></i></td>
                     @endif
                     <td>
                         @if($categoria->estado == 1)
                             <a onclick="eliminarCategoria('{{$categoria->id}}')" style="color: red; font-size: 2.5rem; padding: 0.5rem; cursor: pointer; margin-right: 2rem">
                                 <input type="hidden" name="eliminarcategoria{{$categoria->id}}" value="{{$categoria->id}}"/>
                                 <i class="fa fa-trash"></i>
                             </a>
                             <a id="editar_categoria{{$categoria->id}}" onclick="editarCategoria('{{$categoria->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                 <input type="hidden" name="editarcategoria{{$categoria->id}}" value="{{$categoria->id}}"/>
                                 <i class="fa fa-pencil"></i>
                             </a>
                         @else
                             <a id="editar_categoria{{$categoria->id}}" onclick="editarCategoria('{{$categoria->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                 <input type="hidden" name="editarcategoria{{$categoria->id}}" value="{{$categoria->id}}"/>
                                 <i class="fa fa-pencil"></i>
                             </a>
                         @endif


                     </td>
                 </tr>
             @endforeach
             </tbody>
         </table>
    </div>

    </div>
    <script type="text/javascript">
        function eliminarCategoria(id){
            if (confirm('¿Estas seguro que desea desactivar......... '+$('#texto'+id).text()+'?')) {
                $(document).ready(function(){
                    var id_categoria = $(this).find( 'input[name="eliminarcategoria'+id+'"]' ).val();
                    var url = '{{route("eliminar.categoria")}}';
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            idcategoria: id_categoria
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
            }
            else{
            }
        };
    </script>
    <script type="text/javascript">
        function editarCategoria(id){
                $(document).ready(function(){
                    var id_categoria = $(this).find( 'input[name="editarcategoria'+id+'"]' ).val();
                    var url = '{{route("editar.categoria")}}';
                    $("#editar_categoria"+id).attr('data-toggle','modal');

                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            idcategoria: id_categoria
                        },
                        dataType: 'JSON',

                        error: function() {
                            $("#respuesta").html('<div> Ha surgido un error. </div>');
                        },
                        success: function(respuesta){
                            $('#categoriaid').val(respuesta['id'])
                            $("#descripcategoria").val(respuesta['descripcion']);
                            if(respuesta['estado']==1){
                                $("#activo").attr('checked','true');
                            }
                            else{
                                $("#inactivo").attr('checked','true');
                            }
                        }
                    });
                    $("#editar_categoria"+id).attr('data-target','#editar_categoria_modal');

                });
        };
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#categoria_modal').on('shown.bs.modal',
                    function () {
                        $('#texto_descripcion').focus();
                    });
        });

//        $(document).keydown(function(tecla){
//            if (tecla.keyCode ==78) {
//                $("#categoria_modal").modal('show');
//            }
//        });

        $(document).ready(function () {
            $("#modulo-mantenimiento").addClass('active');
        });

        $('#categoria_modal').on('hidden.bs.modal', function () {
            $(this).find("#texto_descripcion").val('').end();

        });

    </script>


@endsection
{{--modal crear categoria--}}
{{--<div class="container">        <!-- Modal crear -->--}}
    {{--<div class="modal fade " id="categoria_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="gridModalLabel" aria-hidden="true">>--}}
        {{--<div class="modal-dialog modal-md">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Registrar Nueva Categoria</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--formulario crear--}}
                    {{--<div class="box box-primary">--}}
                        {{--{!! Form::open(['action' => 'MantenimientoController@crearCategoria','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}--}}
                        {{--<div class="box-body">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="inputName" class="col-md-2 control-label">Categoria</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input id="texto_descripcion" onkeypress="return soloLetras(event)" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Categoria" name="descripcion_categoria">--}}
                                    {{--<span style="font-size: 1.2rem; color: #0000ff; padding-left: 0.3rem">Maximo 30 caracteres</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<input id="activo"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>--}}
                                    {{--<input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="box-footer" style="text-align: center">--}}
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            {{--<button type="submit" class="btn btn-info">Guardar</button>--}}
                            {{--<button href="" class="btn btn-default" data-dismiss="modal" >Cancelar</button>--}}
                        {{--</div>--}}

                        {{--<!-- /.box-body -->--}}

                        {{--{!! Form::close() !!}--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--modal editar categoria--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="editar_categoria_modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Categoria</h4>
                </div>
                <div class="modal-body">
                    {{--formulario editar categoria--}}
                    <div class="box box-primary">
                        {!! Form::open(['action' => 'MantenimientoController@actualizarCategoria','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-md-2 control-label">Categoria</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="categoriaid" name="categoria_id" value=""/>
                                    <input id="descripcategoria" onkeypress="return soloLetras(event)" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Categoria" name="descripcion_categoria" >
                                    <span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres.</span>
                                </div>
                                <div class="col-md-4">
                                    <input id="activo"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                    <input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer" style="text-align: center">
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            <button type="submit" class="btn btn-info">Guardar</button>
                            <button href="" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        </div>

                        <!-- /.box-body -->

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

