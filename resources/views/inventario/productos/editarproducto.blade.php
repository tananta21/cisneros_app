@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')

    <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Editar Producto</h4>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

    <script>
        $(document).ready(function () {
            $("#modulo-inventario").addClass('active');
        });
    </script>

    <div>
        <form method="POST" action="/inventario/producto/actualizar/{{$editarProducto->id}}" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}

            <div class="col-lg-6 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12">Tipo Producto</h5>
                <div class="col-lg-12 col-sm-12  col-xs-12">
                    <input  readonly type="text" class="form-control" placeholder="Serie o Codigo Producto" value="Producto">
                    <input  type="hidden" name="tipo_producto" value="1">
                </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" type="text" maxlength="30" class="form-control" placeholder="Serie o Codigo Producto" name="serie" value="{{$editarProducto->serie}}">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nombre Producto" maxlength="50" name="nombre" value="{{$editarProducto->nombre}}" onkeypress="return soloLetras(event)">
                    </div>
                </div>

            </div>
            <div class="col-lg-12 caja_formulario">

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                        <h5 onclick="" class="col-lg-4 titulos">Categorias</h5>
                        <a href="" data-toggle="modal" data-target="#categoria_modal"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <select class="form-control" name="categoria">
                            @foreach($categorias as $categoria)
                                @if($categoria->id == $editarProducto->categoria_id)
                                    <option selected value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                @else
                                    <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                        <h5 onclick="" class="col-lg-4 titulos">Marca</h5>
                        <a href="" data-toggle="modal" data-target="#marca_modal"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <select id="marcas" class="form-control" name="marca" onchange="buscarModelo(this.value);">
                            @foreach($marcas as $marca)
                                @if($marca->id == $marca_seleccionada)
                                    <option selected value="{{$marca->id}}">{{$marca->descripcion}}</option>
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
                        <a onclick="buscarMarcas()"  id="agregar_modelo"  data-toggle="modal" data-target="#modelo_modal" href="#"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <select id="modelos" class="form-control" name="modelo">
                            @foreach($modelos as $modelo )
                                @if($modelo->id == $editarProducto->modelo_id )
                                    <option selected value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                @else
                                    <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Stock Actual</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input  type="number" class="form-control" placeholder="Stock Actual" onkeypress="return solonumeros(event)" name="stock_actual" value="{{$editarProducto->stock_actual}}" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Stock Minimo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input  type="number" class="form-control" placeholder="Stock Minimo" onkeypress="return solonumeros(event)" name="stock_minimo" value="{{$editarProducto->stock_minimo}}" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Stock Maximo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input  type="number" class="form-control" placeholder="Stock Maximo" onkeypress="return solonumeros(event)" name="stock_maximo" value="{{$editarProducto->stock_maximo}}" min="0" max="9999" maxlength="4"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Precio</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input step="any" required  type="number" class="form-control" onkeypress="return NumCheck(event, this)" placeholder="S/. " name="precio" value="{{$editarProducto->precio}}"  min="0" max="99999" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Descripcion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input type="text" class="form-control" placeholder="Descripcion Producto" name="descripcion" value="{{$editarProducto->descripcion}}" onkeypress="return soloLetras(event)">
                    </div>
                </div>
            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Estado</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        @if($editarProducto->estado==1)
                            <input type="radio"  name="estado" value="{{$editarProducto->estado==1}}" checked> Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                        @else
                            <input  type="radio"  name="estado" value="1"> Activo
                            <input type="radio" name="estado" value="{{$editarProducto->estado==1}}" style="margin-left: 2rem" checked > Inactivo
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                <button type="submit" class="btn btn-primary" style="margin-right: 1rem" >ACEPTAR</button>
                <a type="button" href="javascript:window.history.back();" class="btn btn-default">CANCELAR</a>
            </div>
        </form>
    </div>


@endsection

