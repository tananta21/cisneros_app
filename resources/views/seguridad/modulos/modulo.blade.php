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

    <div>
        <div class="col-lg-12">
            <h3 class="col-lg-12">Gestor de modulos del Sistema</h3>
        </div>

    </div>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
    <div style="padding-bottom: 1.5rem">
        <div class="col-lg-12">
            <p class="col-lg-4"> Usted podra configurar las opciones generales de los modulos principales y submodulos del sistema</p>
            <span class="col-lg-1" style="margin-left: 1rem; font-weight: bold">Modulos Principales</span>
            <div class="col-lg-1" style="background:#000066; padding-top: 1rem; padding-bottom: 1rem"></div>

            <span class="col-lg-1" style="margin-left: 3rem; margin-right: 1rem; font-weight: bold">Submodulos</span>
            <div class="col-lg-1" style="background:#7eb4d3; padding-top: 1rem; padding-bottom: 1rem">
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="font-size: 1.5rem">
        <ul class="nav" >
            @foreach($modulos as $modulo)
                <li class="treeview col-lg-4"  style="padding-top: 2rem; padding-bottom: 1rem">

                    {{--@if($modulo->estado == 1)--}}
                        {{--<input id="estado{{$modulo->id}}" type="checkbox" name="checkboxlist" value="{{$modulo->estado}}" checked  onclick="cambiarEstado('{{$modulo->id}}')"/>--}}
                    {{--@else--}}
                        {{--<input id="estado{{$modulo->id}}" type="checkbox" name="checkboxlist" value="{{$modulo->estado}}"   onclick="cambiarEstado('{{$modulo->id}}')"/>--}}
                    {{--@endif--}}
                    <i onclick="buscarModulo('{{$modulo->id}}');" style="color: green;cursor: pointer;  font-size: 2rem; padding: 0.5rem" class="fa fa-pencil">
                    </i>
                    <span style="color: #000066; font-weight: bold; text-transform: uppercase; margin-right: 1.5rem">{{$modulo->descripcion}}</span>
                    <i class="{{$modulo->icono}}"></i>
                    <ul class="treeview" style="padding-top: 1rem; list-style: none">
                        @foreach($submodulos as $submodulo)
                            @if($modulo->id == $submodulo->id_padre)
                                <li class="treeview">
                                    <i onclick="buscarModulo('{{$submodulo->id}}');" style="color: green;cursor: pointer;  font-size: 2rem; padding: 0.5rem" class="fa fa-pencil"></i>
                                    <a style="margin-left: 1rem" href="{{$submodulo->url}}">{{$submodulo->descripcion}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function buscarModulo(id){
            var url = '{{route("buscar.modulo")}}';
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    idmodulo: id
                },
                dataType: 'JSON',
                error: function() {
                    $("#respuesta").html('<div> Ha surgido un error. </div>');
                },
                success: function(modulo) {

                    $("#descripmodulo").val(modulo.descripcion);
                    $("#moduloid").val(modulo.id);
                    if(modulo.estado === 1){
                        $("#inactivo").removeAttr("checked");
                        $("#activo").prop("checked",true);
                    }
                    else{
                        $("#activo").removeAttr("checked");
                        $("#inactivo").prop("checked",true);
                    }

                }
            });
            $('#modulo_modal').modal('show');
        }
    </script>

@endsection
@endsection

{{--modal editar --}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="modulo_modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Modulo</h4>
                </div>
                <div class="modal-body">
                    {{--formulario editar --}}
                    <div class="box box-primary">
                        {!! Form::open(['action' => 'AccesoModuloController@actualizarModulo','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName" class="col-md-2 control-label">Descripcion</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="moduloid" name="modulo_id" value=""/>
                                    <input id="descripmodulo" onkeypress="return soloLetras(event)"  required="true" maxlength="20" type="text" class="form-control"  placeholder="Nombre Modulo" name="descripcion_modulo" >
                                    <span style="font-size: 1rem; color: #0000ff">Maximo 20 caracteres</span>
                                </div>
                                <div class="col-md-4">
                                    <input id="activo"  type="radio"  name="estado" value="1"> <label style="cursor: pointer" for="activo"> Activo</label>
                                    <input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="inputName" class="col-md-2 control-label">URL</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input id="descripmarca" onkeypress="return soloLetras(event)"  required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Tipo" name="descripcion_marca" >--}}
                                    {{--<span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres</span>--}}
                                 {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="inputName" class="col-md-2 control-label">Icono</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input id="descripmarca" onkeypress="return soloLetras(event)"  required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Tipo" name="descripcion_marca" >--}}
                                    {{--<span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres</span>--}}
                                 {{--</div>--}}
                            {{--</div>--}}

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