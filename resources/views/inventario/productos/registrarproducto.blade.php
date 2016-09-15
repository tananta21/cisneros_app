@extends('index')
@section('vistainicial')
@stop
@section('contenido_modulos')

    <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Producto / Servicio</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
    <div>
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
                <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                    <h5 onclick="" class="col-lg-4 titulos">Marca</h5>
                    <a href=""><i class="fa fa-plus-square fa-1px"></i> Add</a>
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <select class="form-control" name="categoria">
                        <option value="">Marca #1</option>
                        <option value="1">Marca #2</option>
                        {{--HACER LA CONSULTA PARA JALAR MARCA--}}
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                    <h5 onclick="" class="col-lg-4 titulos">Modelos</h5>
                    <a href=""><i class="fa fa-plus-square fa-1px"></i> Add</a>
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <select class="form-control" name="categoria">
                        <option value="">Modelo #1</option>
                        <option value="1">Modelo #2</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div  class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                    <h5 onclick="" class="col-lg-4 titulos">Modelos</h5>
                    <a href=""><i class="fa fa-plus-square fa-1px"></i> Add</a>
                </div>

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


        <div class="col-lg-12 caja_formulario">
        <div class="col-lg-12">
            <h5 class="col-lg-12 titulos">Estado</h5>
            <div class="col-lg-12 col-sm-12 col-xs-12" >
                <input  id="opcionactivo" name="estado" type="radio"> Activo
                <input  id="opcioninactivo" name="estado" type="radio" style="margin-left: 2rem" > Inactivo
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


