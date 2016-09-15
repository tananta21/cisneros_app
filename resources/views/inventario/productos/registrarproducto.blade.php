@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')
    <h2 class="col-lg-12" style="margin-bottom: 0.5rem">Regitrar Producto / Servicio</h2>
    <hr class="col-lg-12" size="5px" color="green"/>

    <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" role="form">

        <div class="col-lg-6 caja_formulario">
            <h5 class="col-lg-12">Tipo Producto</h5>
            <div class="col-lg-6 col-sm-12  col-xs-12">
                <select class="form-control" name="categoria">
                    <option value="">Producto</option>
                    <option value="1">Servicio</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 caja_formulario">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Serie o Codigo Producto" name="nombre" value="">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Nombre Producto</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="">
                </div>
            </div>

        </div>
        <div class="col-lg-12 caja_formulario">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Marca</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <select class="form-control" name="categoria">
                        <option value="">Marca #1</option>
                        <option value="1">Marca #2</option>
                        {{--HACER LA CONSULTA PARA JALAR MARCA--}}
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Modelo</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <select class="form-control" name="categoria">
                        <option value="">Modelo #1</option>
                        <option value="1">Modelo #2</option>
                        {{--HACER LA CONSULTA PARA JALAR MODELO--}}
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Categoria</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <select class="form-control" name="categoria">
                        <option value="">Categoria #1</option>
                        <option value="1">Categoria #2</option>
                        {{--HACER LA CONSULTA PARA JALAR CATEGORIA--}}
                    </select>
                </div>
            </div>




        </div>

        <div class="col-lg-12 caja_formulario">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Stock Actual</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                   <input type="text" class="form-control" placeholder="Stock Actual" name="nombre" value="">
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Stock Minimo</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12" >
                    <input type="text" class="form-control" placeholder="Stock Minimo" name="nombre" value="">
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Stock Maximo</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12" >
                    <input type="text" class="form-control" placeholder="Stock Maximo" name="nombre" value="">
                </div>
            </div>
</div>
        <div class="col-lg-12 caja_formulario">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Precio</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Stock Actual" name="nombre" value="">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <h5 class="col-lg-12 titulos">Descripcion</h5>
                <div class="col-lg-12 col-sm-12 col-xs-12" >
                    <input type="text" class="form-control" placeholder="Stock Minimo" name="nombre" value="">
                </div>
            </div>

        </div>

        <div class="col-lg-5 col-sm-12 col-xs-12" >
            <div class="col-lg-3 col-sm-12 col-xs-12">
            <h5 class="col-lg-12 titulos">Estado</h5>
                <divgi>
                <input type="radio">Activo</input>
                <input type="checkbox">Inactivo</input>

                    </divgi>
    </div></div>



                </form>

            @endsection
            {{--<input name="_token" type="hidden" value="">--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputName" class=" col-sm-1 control-label">Tipo Producto</label>--}}
{{--<div class="col-sm-3">--}}
{{--<select class="form-control" name="tipo_producto">--}}
{{--<option value="1">Producto</option>--}}
{{--<option value="2">Servicio</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputName" class="col-sm-1 control-label">Codigo</label>--}}
{{--<div class="col-sm-3">--}}
{{--<input type="text" class="form-control" placeholder="Codigo Producto" name="codigo" required="required">--}}
{{--</div>--}}
{{--<label for="inputName" class="col-sm-1 control-label">Nombre</label>--}}
{{--<div class="col-sm-6">--}}
{{--<input type="text" class="form-control" placeholder="Nombre Producto" name="nombre">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputEmail3" class="col-sm-1 control-label">Marca</label>--}}
{{--<div class="col-sm-3">--}}
{{--<select class="form-control" name="marca">--}}
{{--<option value="1">Seleccione Marca</option>--}}
{{--<option value="2">Yamaha</option>--}}
{{--<option value="3">zuzuki</option>--}}
{{--<option value="4">taiwan</option>--}}
{{--<option value="5">sfx</option>--}}
{{--<option value="6">honda</option>--}}
{{--</select>--}}
{{--</div>--}}

{{--<label for="inputEmail3" class="col-sm-1 control-label">Categoria</label>--}}
{{--<div class="col-sm-3">--}}
{{--<select class="form-control" name="categoria">--}}
{{--<option value="1">Seleccione Categoria</option>--}}
{{--<option value="2">llantas</option>--}}
{{--<option value="3">sistema electrico</option>--}}
{{--<option value="4">motores</option>--}}
{{--</select>--}}
{{--</div>--}}

{{--<label for="inputEmail3" class="col-sm-1 control-label">Modelo</label>--}}
{{--<div class="col-sm-3">--}}
{{--<select class="form-control" name="modelo">--}}
{{--<option value="1">Seleccione Modelo</option>--}}
{{--<option value="2">peque�o</option>--}}
{{--<option value="3">mediano</option>--}}
{{--<option value="4">grande</option>--}}
{{--</select>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputName" class="col-sm-1 control-label">Stock Actual</label>--}}
{{--<div class="col-sm-3">--}}
{{--<input type="number" class="form-control" placeholder="Stock actual" name="stock_actual">--}}
{{--</div>--}}
{{--<label for="inputName" class="col-sm-1 control-label">Stock Minimo</label>--}}
{{--<div class="col-sm-3">--}}
{{--<input type="number" class="form-control" placeholder="Stock minimo" name="stock_minimo">--}}
{{--</div>--}}
{{--<label for="inputName" class="col-sm-1 control-label">Stock Maximo</label>--}}
{{--<div class="col-sm-3">--}}
{{--<input type="number" class="form-control" placeholder="Stock maximo" name="stock_maximo">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputName" class="col-sm-1 control-label">Precio</label>--}}
{{--<div class="col-sm-3">--}}
{{--<input type="text" class="form-control" placeholder="S/." name="codigo" required="required">--}}
{{--</div>--}}
{{--<label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>--}}
{{--<div class="col-sm-5">--}}
{{--<textarea class="form-control" placeholder="descripcion Producto" name="descripcion"></textarea>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="box-body">--}}
{{--<div class="form-group">--}}
{{--<label for="inputName" class="col-sm-1 control-label">Estado Producto</label>--}}
{{--<label class="col-sm-1  control-label" style="text-align: center; color: green">--}}
{{--<input type="radio" name="estado" value="1" checked=""> Activo<br>--}}
{{--</label>--}}
{{--<label class="col-sm-1 control-label" style="text-align: center; color: red">--}}
{{--<input type="radio" name="estado" value="0"> Inactivo<br>--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}



{{--<div class="box-footer" style="text-align: center">--}}
{{--<a href="/sales/productos" class="btn btn-default">Cancelar</a>--}}
{{--<button type="submit" class="btn btn-info">Guardar</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
