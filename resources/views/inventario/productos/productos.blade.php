@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/inventario/productos">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Almacen Principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Almacen Tienda</a>
            </li>
        </ul>
        </div>

    <script>
        $(document).ready(function () {
            var url = window.location;
            // Will only work if string in href matches with location
            $('ul.nav a[href="' + url + '"]').parent().addClass('active');

            // Will also work for relative and absolute hrefs
            $('ul.nav a').filter(function () {
                return this.href == url;
            }).parent().addClass('active').parent().parent().addClass('active');
        });
    </script>



    @section('contenido_modulos')
        <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Productos / Servicios</h3>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-12">
            <a href="/inventario/producto/nuevoproducto" type="button" class="btn btn-w-m btn-primary"> AGREGAR NUEVO PRODUCTO
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>

        <div class="col-lg-12" style="margin-top: 0.5rem">



            {!! Form::model(Request::all(),['route'=>'buscar.producto','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center; padding-bottom: 3rem">
                    <h5 class="col-lg-2">Filtros de Busqueda</h5>
                    <div class="col-lg-2" style="padding-left: 0rem">
                        {{--<select class="form-control" name="tipo_producto">--}}
                            {{--<option value="">Productos</option>--}}
                            {{--<option value="2">Servicios</option>--}}
                        {{--</select>--}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <button type="submit" class="btn btn-w-m btn-primary col-lg-2"> Buscar
                            <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                        </button>
                        <div class="col-lg-2 col-sm-2">
                            {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                            {!!form::text('serie',null,['class'=>'form-control', 'placeholder'=>'Serie Producto'])!!}
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            {{--<input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="">--}}
                            {!!form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre Producto'])!!}
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            {!!form::select('categoria',['' => 'Select categoria','1' => '--------','2' => 'llantas','3' => 'sistema electrico','4' => 'motores'],null,['class'=>'form-control'])!!}
                        </div>

                        <div class="col-lg-2 col-sm-2">
                            {!!form::select('marca',['' => 'Select marca','1' => '--------','2' => 'Yamaha','3' => 'zuzuki','4'=>'taiwan'],null,['class'=>'form-control'])!!}
                        </div>

                        <div class="col-lg-2 col-sm-2">
                            {!!form::select('modelo',['' => 'Select modelo','1' => '--------','2' => 'pistera','3' => 'cgl 110','4'=>'chacarera'],null,['class'=>'form-control'])!!}
                        </div>


                    </div>
                </div>
            {!! Form::close() !!}

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
                @foreach($productos as $producto)
                    <tr data-id="{{$producto->id}}" id="filaproducto{{$producto->id}}">
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->serie}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->tipoProducto->descripcion}}</td>
                        <td>{{$producto->categoria->descripcion}}</td>
                        <td>{{$producto->marca->descripcion}}</td>
                        <td>{{$producto->modelo->descripcion}}</td>
                        @if($producto->estado == 1)
                            <td>Activo</td>
                        @else
                            <td>Inactivo</td>
                        @endif
                        <td>
                            <a onclick="eliminarPro('{{$producto->id}}')"  style="color: red; font-size: 2.5rem; padding: 0.5rem">
                                <input type="hidden" name="eliminarproducto{{$producto->id}}" value="{{$producto->id}}"/>
                                <i class="fa fa-remove"></i>
                            </a>
                            <a href="/inventario/producto/editar/{{$producto->id}}" style="color: green;  font-size: 2.5rem; padding: 0.5rem">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $productos->appends(Request::all())->render() !!}
        </div>

        <script type="text/javascript">
            function eliminarPro(id){
                if (confirm('¿Estas seguro que desea eliminar el Producto ?')) {
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
                }
                else{
                }
            };
        </script>
    @endsection
@endsection



