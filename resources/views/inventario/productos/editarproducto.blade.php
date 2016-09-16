@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')

    <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Editar Producto / Servicio</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
    <div>
        <form method="POST" action="/inventario/producto/actualizar/{{$editarProducto->id}}" accept-charset="UTF-8" class="form-horizontal" role="form">
            {!! csrf_field() !!}

            <div class="col-lg-6 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12">Tipo Producto</h5>
                <div class="col-lg-12 col-sm-12  col-xs-12">
                    <select class="form-control" name="tipo_producto">
                        @if($editarProducto->tipo_producto_id == 1)
                        <option value="1" selected>Productos</option>
                        <option value="2" >Servicios</option>
                        @else
                        <option value="2" selected>Servicio</option>
                        <option value="1" >Producto</option>
                        @endif
                    </select>
                </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input required="true" type="text" class="form-control" placeholder="Serie o Codigo Producto" name="serie" value="{{$editarProducto->serie}}">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="{{$editarProducto->nombre}}">
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
                                @if($categoria->id == $id_categoria)
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
                        <select class="form-control" name="marca">
                            @foreach($marcas as $marca)
                                @if($marca->id == $id_marca)
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
                        <h5 onclick="" class="col-lg-4 titulos">Modelos</h5>
                        <a  data-toggle="modal" data-target="#modelo_modal" href="#"><i class="fa fa-plus-square fa-1px"></i> Add</a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <select class="form-control" name="modelo">
                            @foreach($modelos as $modelo)
                                @if($modelo->id == $id_modelo)
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
                        <input readonly="true" type="text" class="form-control" placeholder="Stock Actual" name="stock_actual" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Stock Minimo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input readonly="true" type="text" class="form-control" placeholder="Stock Minimo" name="stock_minimo" value="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Stock Maximo</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input readonly="true" type="text" class="form-control" placeholder="Stock Maximo" name="stock_maximo" value="">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Precio</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <input readonly="true" type="text" class="form-control" placeholder="S/. " name="precio" value="">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h5 class="col-lg-12 titulos">Descripcion</h5>
                    <div class="col-lg-12 col-sm-12 col-xs-12" >
                        <input type="text" class="form-control" placeholder="Descripcion Producto" name="descripcion" value="{{$editarProducto->descripcion}}">
                    </div>
                </div>
            </div>


            <div class="col-lg-12 caja_formulario">
                <div class="col-lg-12">
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
                <a type="button" href="/inventario/productos" class="btn btn-default" style="margin-right: 1rem">CANCELAR</a>
                <button type="submit" class="btn btn-primary" >ACEPTAR</button>
            </div>
        </form>
    </div>


@endsection

