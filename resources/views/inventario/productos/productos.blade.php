@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
        <div>
            <header style="background: #b7c7d5">
                <ul style="display: flex; list-style: none; padding: 0rem">
                    <li>
                        <div style="padding-top:1rem; padding-bottom: 1rem; background: #1FD3AF; border: dashed 0.5px #000000">
                            <a href="#" style="padding:2rem; color: white; font-weight: bold" >Productos</a>
                        </div>
                    </li>
                    <li>
                        <div style="padding-top:1rem; padding-bottom: 1rem;background: #ecf0f5; border: dashed 0.5px #808080">
                            <a href="#" style="padding:2rem; color: #000000; font-weight: bold" >Almacen Tienda</a>
                        </div>
                    </li>
                    <li>
                        <div style="padding-top:1rem; padding-bottom: 1rem;background: #ecf0f5; border: dashed 0.5px #808080">
                            <a href="#" style="padding:2rem; color: #000000; font-weight: bold" >Almacen Principal</a>
                        </div>
                    </li>

                </ul>
            </header>
        </div>

    @section('contenido_modulos')
        <h2 class="col-lg-12" style="margin-bottom: 0.5rem">Productos / Servicios</h2>
        <hr class="col-lg-12" size="5px" color="green"/>
        <div class="col-lg-12">
            <a href="/inventario/productos/nuevoproducto" type="button" class="btn btn-w-m btn-primary"> AGREGAR NUEVO PRODUCTO
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>

        <div class="col-lg-12" style="padding-top: 2rem">
            <h3 class="col-lg-12">
                Lista de Productos
            </h3>
            <form method="GET" action="#" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center; padding-bottom: 3rem">
                    <h5 class="col-lg-2">FILTROS DE BUSQUEDA</h5>
                    <div class="col-lg-2" style="padding-left: 0rem">
                        <select class="form-control" name="marca">
                            <option value="1">Productos</option>
                            <option value="2">Servicios</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-w-m btn-primary col-lg-2"> Buscar
                            <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                        </button>
                        <div class="col-lg-2 col-sm-2">
                            <input type="text" class="form-control" placeholder="Serie Producto" name="codigo" value="">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="">
                        </div>

                        <div class="col-lg-2 col-sm-2">
                            <select class="form-control" name="categoria">
                                <option value="">Categoria</option>
                                <option value="1">--------</option>
                                <option value="2">llantas</option>
                                <option value="3">sistema electrico</option>
                                <option value="4">motores</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-sm-2">
                            <select class="form-control" name="modelo">
                                <option value="">Modelo</option>
                                <option value="1">--------</option>
                                <option value="2">pequeño</option>
                                <option value="3">mediano</option>
                                <option value="4">grande</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-sm-2">
                            <select class="form-control" name="marca">
                                <option value="" selected="">Marca</option>
                                <option value="1">--------</option>
                                <option value="2">Yamaha</option>
                                <option value="3">zuzuki</option>
                                <option value="4">taiwan</option>
                                <option value="5">sfx</option>
                                <option value="6">honda</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="box-body table-responsive no-padding col-lg-12">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>N°</th>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>STOCK ACTUAL</th>
                    <th>MARCA</th>
                    <th>CATEGORIA</th>
                    <th>MODELO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                <tr data-id="1">
                    <td>1</td>
                    <td>91960454</td>
                    <td>Prof. Ewald Stamm</td>
                    <td>83.00</td>
                    <td>Yamaha</td>
                    <td>motores</td>
                    <td>mediano</td>
                    <td>Inactivo</td>
                    <td><a href="" id="boton"><span class="label label-success">Editar</span> </a>
                        <a href=""><span class="label label-danger" onclick="return confirm('¿Estas seguro que desea eliminar el Producto Prof. Ewald Stamm ?');">Eliminar</span></a>
                    </td>
                </tr>

                <tr data-id="2">
                    <td>2</td>
                    <td>66507314</td>
                    <td>Mrs. Jena Turcotte</td>
                    <td>92.00</td>
                    <td>zuzuki</td>
                    <td>motores</td>
                    <td>grande</td>
                    <td>Activo</td>
                    <td><a href="" id="boton"><span class="label label-success">Editar</span> </a>
                        <a href=""><span class="label label-danger" onclick="return confirm('¿Estas seguro que desea eliminar el Producto Mrs. Jena Turcotte ?');">Eliminar</span></a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    @endsection
@endsection

