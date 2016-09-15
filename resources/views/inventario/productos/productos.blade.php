@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <link rel="stylesheet" href="{{url('/')}}/nuestro.css">
    <div>
            <header class="header-submenu">
                <ul class="ul-submenu">
                    <li>
                        <div class="caja-ancla-submenu">
                            <a class="ancla-submenu" href="#" style="padding:2rem; color: white; font-weight: bold" >Productos</a>
                        </div>
                    </li>
                    <li>
                        <div class="caja-ancla-submenu">
                            <a class="ancla-submenu" href="#">Almacen Tienda</a>
                        </div>
                    </li>
                    <li>
                        <div class="caja-ancla-submenu">
                            <a class="ancla-submenu" href="#"  >Almacen Principal</a>
                        </div>
                    </li>

                </ul>
            </header>
        </div>

    @section('contenido_modulos')
        <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Productos / Servicios</h3>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-12">
            <a href="/inventario/productos/nuevoproducto" type="button" class="btn btn-w-m btn-primary"> AGREGAR NUEVO PRODUCTO
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>

        <div class="col-lg-12" style="margin-top: 0.5rem">
            <h3 class="col-lg-12">
                Lista de Productos
            </h3>
            <form method="GET" action="#" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center; padding-bottom: 3rem">
                    <h5 class="col-lg-2">Filtros de Busqueda</h5>
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
                    <th>MODELO</th>
                    <th>MARCA</th>
                    <th>CATEGORIA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                @foreach($productos as $producto)
                    <tr data-id="{{$producto->id}}" id="filaproducto{{$producto->id}}">
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->serie}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->modelo->descripcion}}</td>
                        <td>{{$producto->modelo->marca->descripcion}}</td>
                        <td>{{$producto->modelo->categoria->descripcion}}</td>
                        @if($producto->estado == 1)
                            <td>Activo</td>
                        @else
                            <td>Inactivo</td>
                        @endif
                        <td>
                            <a onclick=" return confirm('¿Estas seguro que desea eliminar el Producto {{$producto->nombre}}'),eliminarPro('{{$producto->id}}');"  style="color: red; font-size: 2.5rem; padding: 0.5rem">
                                <input type="hidden" name="eliminarproducto{{$producto->id}}" value="{{$producto->id}}"/>
                                <i class="fa fa-remove"></i>
                            </a>
                            <a href="" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <script type="text/javascript">
                function eliminarPro(id){
                $(document).ready(function(){
                        var id_producto = $(this).find( 'input[name="eliminarproducto'+id+'"]' ).val();
                        var url = '{{route("eliminar.producto")}}';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                idproducto: id_producto
                            },
                            dataType: 'JSON',

                            error: function() {
                                $("#respuesta").html('<div> Ha surgido un error. </div>');
                            },

                            success: function(){
                                $("#filaproducto"+id).remove();;
                            }
                        });
                });

                };

            </script>
        </div>
        <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $productos->appends(Request::all())->render() !!}
        </div>
    @endsection
@endsection

{{--kevin--}}


