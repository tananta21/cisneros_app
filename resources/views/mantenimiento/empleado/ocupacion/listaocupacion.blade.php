@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

    <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Gestor de Ocupaciones</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

    <div class="col-lg-7">
        {!! Form::model(Request::all(),['route'=>'buscar.ocupacion','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
        <div class="col-lg-1">
            <span style="font-size: 1.5rem">Estado</span>
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
        <a data-toggle="modal" data-target="#crear_tipoproducto_modal" href="#" style="font-size: 1.6rem">
            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i> <span style="color: #000000">Agregar Ocupacion</span>
        </a>
    </div>



    <div class="box-body table-responsive no-padding col-lg-12">
        <table id="marca" class=" table table-hover display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>N° ID</th>
                <th>NOMBRE</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marcas as $marca)
                <tr data-id="{{$marca->id}}" id="filaproducto{{$marca->id}}">
                    <td>{{$marca->id}}</td>
                    <td>{{$marca->descripcion}}</td>
                    @if($marca->estado == 1)
                        <td>Activo <i class="fa fa-check-circle-o " style="color: green"></i></td>
                    @else
                        <td>Inactivo <i class="fa fa-check-circle-o " style="color: orange"></i></td>
                    @endif
                    <td>
                        @if($marca->estado == 1)
                            <a onclick="eliminarCategoria('{{$marca->id}}')" style="color: red; font-size: 2.5rem; padding: 0.5rem; cursor: pointer; margin-right: 2rem">
                                <input type="hidden" name="eliminarmarca{{$marca->id}}" value="{{$marca->id}}"/>
                                <i class="fa fa-trash"></i>
                            </a>
                            <a id="editar_marca{{$marca->id}}" onclick="editarCategoria('{{$marca->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                <input type="hidden" name="editarmarca{{$marca->id}}" value="{{$marca->id}}"/>
                                <i class="fa fa-pencil"></i>
                            </a>
                        @else
                            <a id="editar_marca{{$marca->id}}" onclick="editarCategoria('{{$marca->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                <input type="hidden" name="editarmarca{{$marca->id}}" value="{{$marca->id}}"/>
                                <i class="fa fa-pencil"></i>
                            </a>
                        @endif


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--javascript eliminar: cambiar de estado--}}
    <script type="text/javascript">
        function eliminarCategoria(id){
            if (confirm('¿Estas seguro que desea desactivar Marca ?')) {
                $(document).ready(function(){
                    var id_marca = $(this).find( 'input[name="eliminarmarca'+id+'"]' ).val();
                    var url = '{{route("eliminar.ocupacion")}}';
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
            }
            else{
            }
        };
    </script>

    {{--javasrcipt editar--}}
    <script type="text/javascript">
        function editarCategoria(id){
            $(document).ready(function(){
                var id_marca = $(this).find( 'input[name="editarmarca'+id+'"]' ).val();
                var url = '{{route("editar.ocupacion")}}';
                $("#editar_marca"+id).attr('data-toggle','modal');
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
                    success: function(respuesta){
                        $('#marcaid').val(respuesta['id'])
                        $("#descripmarca").val(respuesta['descripcion']);
                        if(respuesta['estado']==1){
                            $("#activo").attr('checked','true');
                        }
                        else{
                            $("#inactivo").attr('checked','true');
                        }
                    }
                });
                $("#editar_marca"+id).attr('data-target','#editar_estadocivil_modal');
            });
        };
    </script>




@endsection

{{--modal crear --}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="crear_tipoproducto_modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Ocupacion</h4>
                </div>
                <div class="modal-body">
                    {{--formulario crear --}}
                    <div class="box box-primary">
                        {!! Form::open(['action' => 'MantenimientoEmpleadoController@crearOcupacion','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-md-2 control-label">Tipo</label>
                                <div class="col-md-6">
                                    <input  id="texto_descripcion" onkeypress="return soloLetras(event)" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Ocupacion" name="descripcion_tipo" >
                                    <span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres</span>
                                </div>
                                <div class="col-md-4">
                                    <input  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                    <input  type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer" style="text-align: center">
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            <input type="submit" class="btn btn-info"  value="Guardar"/>
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

{{--modal editar --}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="editar_estadocivil_modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Ocupacion</h4>
                </div>
                <div class="modal-body">
                    {{--formulario editar --}}
                    <div class="box box-primary">
                        {!! Form::open(['action' => 'MantenimientoEmpleadoController@actualizarOcupacion','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-md-2 control-label">Marca</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="marcaid" name="marca_id" value=""/>
                                    <input id="descripmarca"  onkeypress="return soloLetras(event)" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Ocupacion" name="descripcion_marca" >
                                    <span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres</span>
                                </div>
                                <div class="col-md-4">
                                    <input id="activo"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                    <input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer" style="text-align: center">
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            <input type="submit" class="btn btn-info"  value="Guardar"/>
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