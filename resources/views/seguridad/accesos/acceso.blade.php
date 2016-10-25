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
            <h3 class="col-lg-12">Configuracion de Accesos al Sistema</h3>
        </div>
        <div class="col-lg-12" style="margin-top: 2rem; margin-bottom: 2rem">
            {!! Form::model(Request::all(),['route'=>'buscar.accesos','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="col-lg-4">
                {!! Form::select('tipo_empleado',
                     (['0' => 'Seleccione Tipo Empleado'] + $tipo_empleado),
                      null,
                     ['class' => 'form-control','onChange'=>'contenidoModulo(this.value);','id'=>'tipo']) !!}
                <span id="aviso" style="color:red; margin-left: 1rem ">Debes seleccionar una opcion</span>
            </div>

            <div class="col-lg-1">
                <button id="consultar" disabled type="submit" class="btn btn-primary">Ver Modulos   <i class="fa fa-search"></i></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="col-lg-12" id="contenido_modulos" style="display: none" >
        <div class="col-lg-12" style="padding-bottom: 3rem">
            <h4  style="font-weight: bold;">Acceso a los Modulos del Sistema: <span style="text-transform: uppercase; color: brown;">{{$descripcion[0]['descripcion']}}</span></h4>
        </div>
        <form action="/seguridad/actualizar/acceso" method="get" id="form-accesos">
            {!! csrf_field() !!}
        <div class="col-lg-6" style="font-size: 1.5rem">
            <ul class="nav" >
                @foreach($modulos as $modulo)
                    <li class="treeview" >
                        <input type="hidden" name="idmodulo[]" value="{{$modulo->id_acceso}}"/>
                            {{--<i class="{{$modulo->icono}}"></i>--}}
                            @if($modulo->estado == 1)
                                <input id="estado{{$modulo->id_acceso}}" type="checkbox" name="checkboxlist" value="{{$modulo->estado}}" checked  onclick="cambiarEstado('{{$modulo->id_acceso}}')"/>
                            @else
                                <input id="estado{{$modulo->id_acceso}}" type="checkbox" name="checkboxlist" value="{{$modulo->estado}}"   onclick="cambiarEstado('{{$modulo->id_acceso}}')"/>
                            @endif
                            <span style="color: #000066; font-weight: bold; text-transform: uppercase">{{$modulo->descripcion}}</span>
                            <ul class="treeview" style="list-style:none; padding-top: 0.5rem">
                                @foreach($submodulos as $submodulo)
                                    @if($modulo->id == $submodulo->id_padre)
                                         <li class="treeview">
                                             <input type="hidden" name="idsubmodulo[]" value="{{$submodulo->id_acceso}}"/>
                                             @if($submodulo->estado == 1)
                                                 <input id="estado{{$submodulo->id_acceso}}" type="checkbox" name="estadosub" checked value="{{$submodulo->estado}}" checked onclick="cambiarEstado('{{$submodulo->id_acceso}}')"/>
                                             @else
                                                 <input id="estado{{$submodulo->id_acceso}}" type="checkbox" name="estadosub" value="{{$submodulo->estado}}" onclick="cambiarEstado('{{$submodulo->id_acceso}}')"/>
                                             @endif
                                             <a style="margin-left: 1rem" href="{{$submodulo->url}}">{{$submodulo->descripcion}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-4" style="text-align: center">
            <button type="submit" class="btn btn-info">Guardar Cambios</button>
            <button onclick="window.location.reload()" class="btn btn-default" data-dismiss="modal" style="margin-left: 1.5rem" >Revertir Cambios</button>
        </div>
        </form>
    </div>
    </div>

    <script>
        function cambiarEstado(id){
            if( $('#estado'+id).is(':checked') ) {
                $('#estado'+id).val("1");
            }
            else{
                $('#estado'+id).val("0");
            }
        }

        $(document).ready(function() {
            $("#form-accesos").submit(function() {
                var idmodulo = $('input[name="idmodulo[]"]').serializeArray();
                var idsubmodulo = $('input[name="idsubmodulo[]"]').serializeArray();
                var form = $('#form-accesos');
                var url = form.attr('action');
                var checkValues = $('input[name=checkboxlist]').map(function()
                {
                    return $(this).val();
                }).get();

                var estadosubmodulos = $('input[name=estadosub]').map(function()
                {
                    return $(this).val();
                }).get();


                $.ajax({
                    url: url,
                    type: 'get',
                    data: {
                        idmodulos : idmodulo,
                        idsubmodulos : idsubmodulo,
                        estadomodulo: checkValues,
                        estadosubmodulo: estadosubmodulos
//                        legajo: $("#legajo").val(),
//                            "_token": $(this).find( 'input[name="_token"]' ).val()
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function() {
                        location.reload();
                    }
                });
                return false;
            });
            });
    </script>

    <script>
        $(document).ready(function() {
            if($("#tipo").val() != 0){
                $("#contenido_modulos").css("display", "block").addClass("animated fadeInRight");
                $("#consultar").removeAttr("disabled");
                $("#aviso").css("display","none");

            }
        });
        function contenidoModulo(id){
            if(id == 0){
                $("#contenido_modulos").css("display", "none").addClass("animated fadeInRight");
                $("#consultar").attr("disabled","true");
                $("#aviso").css("display","block");
                window.history.pushState("", "", "http://tallercisneros.local/seguridad/acceso");
            }
            else{
                $("#aviso").css("display","none");
                $("#consultar").removeAttr("disabled");
            }
        }
    </script>
@endsection
@endsection
