@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')
    <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Producto / Servicio</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

    <script>
        $(document).ready(function () {
            $("#modulo-inventario").addClass('active');
        });
    </script>


    <div>
        <form method="POST" action="/inventario/producto/registro" accept-charset="UTF-8"  class="form-horizontal" role="form">
            {!! csrf_field() !!}

            <div class="col-lg-6 col-sm-12 col-xs-12 caja_formulario ">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12">Tipo Producto</h5>
                    <div class="col-lg-12 col-sm-12  col-xs-12">
                        <select class="form-control" name="tipo_producto" onchange="cambiarTipoProducto(this.value);">
                            <option value="1">Producto</option>
                            <option value="2">Servicio</option>
                        </select>
                    </div>
                </div>
             </div>

            <div id="producto">

                <div class="col-lg-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input required="true" type="text" class="form-control" placeholder="Serie o Codigo Producto" name="serie" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="">
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 caja_formulario ">

                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5 onclick="" class="col-lg-4 titulos">Categorias</h5>
                            <a href="" data-toggle="modal" data-target="#categoria_modal"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select id="categorias" class="form-control" name="categoria" >
                                @foreach($categorias as $categoria)
                                    @if($categoria->id == 1)
                                        <option value="{{$categoria->id}}" selected>Seleccione Categoria</option>
                                    @else
                                        <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5  class="col-lg-4 titulos">Marcas</h5>
                            <a href="" data-toggle="modal" data-target="#marca_modal"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select id="marcas" class="form-control"  onchange="buscarModelo(this.value);" >
                                @foreach($marcas as $marca)
                                    @if($marca->id == 1)
                                        <option value="{{$marca->id}}" selected >Seleccione Marca</option>
                                    @else
                                        <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5  class="col-lg-4 titulos">Modelos</h5>
                            <a onclick="buscarMarcas()"  id="agregar_modelo" style="cursor: pointer"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select  id="modelos" readonly="true" class="form-control" name="modelo" >
                                <option value="0">Seleccione Modelo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Actual</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                           <input type="number" class="form-control" placeholder="Stock Actual" name="stock_actual" value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Minimo</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input  type="number" class="form-control" placeholder="Stock Minimo" name="stock_minimo" value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Maximo</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input  type="number" class="form-control" placeholder="Stock Maximo" name="stock_maximo" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input step="any" required type="number" class="form-control" placeholder="S/." name="precio" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Descripcion</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input type="text" class="form-control" placeholder="Descripcion Producto" name="descripcion" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Estado</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input  type="radio"  name="estado" value="1" checked> Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                    <button type="submit" class="btn btn-primary" style="margin-right: 1rem" >ACEPTAR</button>
                    <a type="button" href="/inventario/productos" class="btn btn-default" >CANCELAR</a>
                </div>
            </div>


            {{--VISTA DE REGISTRAR SERVICIO--}}
            <div id="servicio" style="display: none">
                <div class="col-lg-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Identificacion de Servicio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input required="true" type="text" class="form-control" placeholder="Codigo de Servicio" name="serie" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Nombre Servicio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Nombre Servicio" name="nombre" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input step="any" required type="number" class="form-control" placeholder="S/." name="precio" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Descripcion</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input type="text" class="form-control" placeholder="Descripcion Servicio" name="descripcion" value="">
                        </div>
                    </div>
                </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input  type="radio"  name="estado" value="1" checked> Activo
                        <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem" >ACEPTAR</button>
                <a type="button" href="/inventario/productos" class="btn btn-default" >CANCELAR</a>
            </div>

            </div>


         </form>
    </div>
    </div>

    {{--script cambiar de producto--}}
    <script>
        function cambiarTipoProducto(id){
            if (id == 1) {
                $(document).ready(function(){
                    $("#producto").css("display", "block").addClass("animated fadeInRight");
                    $("#servicio").css("display", "none");
                });
            }
            if(id==2){
                $("#producto").css("display", "none");
                $("#servicio").css("display", "block").addClass("animated fadeInRight");
            }
        }
    </script>
    {{--script buscar modelos en registrar producto--}}
    <script>
        function buscarModelo(id){
            if(id !=1 ){
                $("#modelos").removeAttr('readonly');
//                $("#agregar_modelo").css('display','block');
                $("#modelos").empty();

                var nro_ubigeo = id;
                var url = '{{route("buscar.modelos")}}';
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        marca : nro_ubigeo
                    },
                    dataType: 'JSON',
                    //
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta){

                        if(jQuery.isEmptyObject(respuesta)){
                            $("#modelos").append('<option value="0">No Existen Modelos</option>');
                        }
                        else{
                            $("#modelos").append('<option value="0">Seleccione Modelo</option>');
                            for(var i in respuesta){
                                $('#modelos').append('<option value="'+respuesta[i].id+'">'+respuesta[i].descripcion+'</option>');

                            }
                        }
                    }
                });
            }
            else{
                $("#modelos").empty();
                $("#modelos").attr('readonly','true');
//                $("#agregar_modelo").css('display','none');
                $("#modelos").append('<option value="0">Seleccione Modelo</option>');
            }
        }

    </script>
    {{--script buscar marcas en registrar modelo en producto--}}
    <script>
        function buscarMarcas(){
            var url = '{{route("buscar.marcas")}}';
            $("#marcas-modelos").empty();
            $.ajax({
                type: 'GET',
                url: url,
                data: {

                },
                dataType: 'JSON',
                //
                error: function() {
                    $("#respuesta").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta){
                    $("#modelo_modal").modal('show');

                    if(jQuery.isEmptyObject(respuesta)){
                        $("#marcas-modelos").append('<option value="0">No Existen Marcas</option>');
                    }
                    else{
                        $("#marcas-modelos").append('<option value="0">Seleccione Marcas</option>');
                        for(var i in respuesta){
                            $('#marcas-modelos').append('<option value="'+respuesta[i].id+'">'+respuesta[i].descripcion+'</option>');

                        }
                    }
                }
            });
        }
    </script>
@endsection


