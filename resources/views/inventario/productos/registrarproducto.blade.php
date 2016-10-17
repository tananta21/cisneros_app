@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')
    <h3 id="cabecera_producto" class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Producto</h3>
    <h3 id="cabecera_servicio" class="col-lg-12" style="margin-bottom: 0.5rem; display: none">Registrar Servicio</h3>
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
                            <input id="serie_producto" required="true" type="text"  maxlength="30" class="form-control" placeholder="Serie o Codigo Producto" name="serie" value="" >
                        </div>

                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input id="nombre_producto"  required="true" type="text" class="form-control" maxlength="50" placeholder="Nombre Producto" name="nombre" value="" onkeypress="return soloLetras(event)">
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
                                <option value="1">Seleccione Modelo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Actual</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                           <input type="number" class="form-control" placeholder="Stock Actual" onkeypress="return solonumeros(event)" name="stock_actual" value="" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Minimo</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input  type="number" class="form-control"  onkeypress="return solonumeros(event)" placeholder="Stock Minimo" name="stock_minimo" value="" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Maximo</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input  type="number" onkeypress="return solonumeros(event)"  class="form-control" placeholder="Stock Maximo" name="stock_maximo" value="" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input id="precio_producto" type="number"  required  step="any" onkeypress="return NumCheck(event, this)"  min="0" max="99999" maxlength="8" class="form-control" placeholder="S/." name="precio"  value=""  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Descripcion</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input  type="text" class="form-control" maxlength="60" placeholder="Descripcion Producto" name="descripcion" value="" onkeypress="return soloLetras(event)">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Estado</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input  type="radio"  name="estado" value="1" checked > Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem" > Inactivo
                        </div>
                    </div>
                </div>
            </div>


            {{--VISTA DE REGISTRAR SERVICIO--}}
            <div id="servicio" style="display: none" >
                <div class="col-lg-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Identificacion de Servicio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input id="serie_servicio"  type="text" class="form-control" maxlength="30" placeholder="Codigo de Servicio" name="serie-servicio" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Nombre Servicio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input id="nombre_servicio"  type="text" class="form-control" onkeypress="return soloLetras(event)" maxlength="50" placeholder="Nombre Servicio" name="nombre-servicio" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input  id="precio_servicio" step="any"  type="number" class="form-control"  onkeypress="return NumCheck(event, this)" min="0" max="99999" maxlength="5" placeholder="S/." name="precio-servicio" value="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>

                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Descripcion</h5>
                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                            <input type="text" class="form-control"  maxlength="60" placeholder="Descripcion Servicio" name="descripcion-servicio" value="" onkeypress="return soloLetras(event)">
                        </div>
                    </div>
                </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input  type="radio"  name="estado-servicio" value="1" checked> Activo
                        <input type="radio" name="estado-servicio" value="0" style="margin-left: 2rem"> Inactivo
                    </div>
                </div>
            </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem" >ACEPTAR</button>
                <a type="button" href="/inventario/productos" class="btn btn-default" >CANCELAR</a>
            </div>


         </form>
    </div>
    </div>

    {{--script cambiar de producto--}}
    <script>
        function cambiarTipoProducto(id){
            if (id == 1) {
                $(document).ready(function(){

                    $("#cabecera_producto").css("display", "block").addClass("animated fadeInRight");
                    $("#cabecera_servicio").css("display", "none");
                    $("#producto").css("display", "block").addClass("animated fadeInRight");
                    $("#servicio").css("display", "none");

                    //   remover required
                    $("#serie_servicio").removeAttr("required");
                    $("#nombre_servicio").removeAttr("required");
                    $("#precio_servicio").removeAttr("required");

                });
            }
            if(id==2){
                $("#cabecera_producto").css("display", "none");
                $("#cabecera_servicio").css("display", "block").addClass("animated fadeInRight");

                $("#producto").css("display", "none");
                $("#servicio").css("display", "block").addClass("animated fadeInRight");
                //   asiganar required para serivicio
                $("#serie_servicio").attr("required","true");
                $("#nombre_servicio").attr("required","true");
                $("#precio_servicio").attr("required","true");

                //   remover required para producto
                $("#serie_producto").removeAttr("required");
                $("#nombre_producto").removeAttr("required");
                $("#precio_producto").removeAttr("required");
            }
        }
    </script>

@endsection


