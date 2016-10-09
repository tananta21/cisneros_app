@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/compra/compranueva">Nueva Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lista Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/compra/provedor">Proveedor</a>
            </li>
        </ul>
    </div>
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$("#modulo-venta").addClass('active');--}}
        {{--});--}}
    {{--</script>--}}
@section('contenido_modulos')

    <div id="lista_cliente">
        <h3 class="col-lg-3" style="margin-bottom: 0.5rem">Clientes</h3>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-3" style="margin-bottom: 3rem">
            <a href="/compra/provedor/registro" {{--onclick="registrarCliente()"--}} type="button" class="btn btn-primary btn-sm"> NUEVO PROVEEDOR
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>
        <div class="box-body table-responsive no-padding col-lg-12">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>N° ID</th>
                    <th>SERIE</th>
                    <th>NOMBRE</th>
                    <th>TIPO</th>
                    <th>CATEGORIA</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                <tr data-id="101" id="filaproducto101">
                    <td>101</td>
                    <td>21</td>
                    <td>el primer producto</td>
                    <td>Producto</td>
                    <td>--------</td>
                    <td>--------</td>
                    <td>--------</td>
                    <td>Activo</td>
                    <td>
                        <a href="/inventario/producto/editar/101"
                           style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{--formulario registrar cliente--}}
    <div id="registrar_cliente" style="display: none">
        <h4 class="col-lg-12" style="margin-bottom: 0.5rem">Registrar Cliente</h4>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div>
            <form method="POST" action="/inventario/producto/registro" accept-charset="UTF-8" class="form-horizontal"
                  role="form">
                <input type="hidden" name="_token" value="xZJGIpm4zdd2dLOTceSvFryNxJzLjRe0YO3fszy1">

                <div class="col-lg-6 col-sm-12 col-xs-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12">Tipo Producto</h5>

                        <div class="col-lg-12 col-sm-12  col-xs-12">
                            <select class="form-control" name="tipo_producto">
                                <option value="1">Producto</option>
                                <option value="2">Servicio</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Serie o Codigo Producto</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input required="true" type="text" class="form-control"
                                   placeholder="Serie o Codigo Producto" name="serie" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Nombre Producto</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre"
                                   value="">
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 caja_formulario ">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5 onclick="" class="col-lg-4 titulos">Categorias</h5>
                            <a href="" data-toggle="modal" data-target="#categoria_modal"><i
                                        class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select class="form-control" name="categoria">
                                <option value="5">lol</option>
                                <option value="4">motores</option>
                                <option value="3">sistema electrico</option>
                                <option value="1" selected="">Seleccione Categoria</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5 class="col-lg-4 titulos">Marcas</h5>
                            <a href="" data-toggle="modal" data-target="#marca_modal"><i
                                        class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select class="form-control" name="marca">
                                <option value="4">taiwan</option>
                                <option value="3">zuzuki</option>
                                <option value="2">Yamaha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="col-lg-12" style="display: flex;  align-items: center;padding: 0rem ">
                            <h5 onclick="" class="col-lg-4 titulos">Modelos</h5>
                            <a href="" data-toggle="modal" data-target="#modelo_modal"><i
                                        class="fa fa-plus-square fa-1px"></i> Add</a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <select class="form-control" name="modelo">
                                <option value="2">pistera</option>
                                <option value="1" selected="">Seleccione Modelo</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Actual</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" placeholder="Stock Actual" name="stock_actual"
                                   value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Minimo</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" placeholder="Stock Minimo" name="stock_minimo"
                                   value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Stock Maximo</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="number" class="form-control" placeholder="Stock Maximo" name="stock_maximo"
                                   value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input step="any" required="" type="number" class="form-control" placeholder="S/."
                                   name="precio" value="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Descripcion</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" placeholder="Descripcion Producto"
                                   name="descripcion" value="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 caja_formulario">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <h5 class="col-lg-12 titulos">Precio</h5>

                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <input type="radio" name="estado" value="1" checked=""> Activo
                            <input type="radio" name="estado" value="0" style="margin-left: 2rem"> Inactivo
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-sm-12 col-xs-12  caja-botones-formulario ">
                    <a type="button" href="/venta/cliente" {{--onclick="cancelar()"--}} class="btn btn-default" style="margin-right: 1rem">CANCELAR</a>
                    <button type="submit" class="btn btn-primary">ACEPTAR</button>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        function registrarCliente() {
            $(document).ready(function () {
                $("#registrar_cliente").css("display", "block").addClass("animated fadeInRight");
                $("#lista_cliente").css("display", "none");
            });
        }

        function cancelar() {
            $("#registrar_cliente").css("display", "none");
            $("#lista_cliente").css("display", "block").addClass("animated fadeInRight");
        }
    </script>




@endsection
@endsection
