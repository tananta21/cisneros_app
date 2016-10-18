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
                <a class="nav-link" href="#">Almacen</a>
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
        <h3 class="col-lg-10" style="margin-bottom: 0.5rem">Productos y Servicios</h3>
        <div class="col-lg-2" style="margin-top: 20px">
            <a href="/inventario/producto/nuevoproducto" type="button" class="btn btn-primary btn-sm"> NUEVO REGISTRO
                <i class="fa fa-plus-square fa-1px" style="margin-left: 1rem"></i>
            </a>
        </div>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>

        <div class="col-lg-12" style="font-weight: bold">
            <span class="col-lg-5">Filtros de Busqueda : </span>
            <span class="col-lg-2">Tipo Producto : </span>
            <span class="col-lg-2">Estado Producto : </span>
        </div>
        <div class="col-lg-12" style="margin-top: 0.1rem; background: #d3d3d3">
            {!! Form::model(Request::all(),['route'=>'buscar.producto','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-lg-1 col-sm-2" >
                            <a type="button" href="/inventario/productos" class="btn btn-default">Refresh <i class="fa fa-refresh fa-1x"></i></a>
                        </div>
                        <div class="col-lg-4">
                            {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
                            {!!form::text('serie',null,['class'=>'form-control', 'placeholder'=>'Serie o Nombre de Producto o Servicio'])!!}
                        </div>
                        <div class="col-lg-2 col-sm-2" style="display: none">
                            {{--<input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" value="">--}}
                            {!!form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre Producto'])!!}
                        </div>
                        <div class="col-lg-2 col-sm-2" style="display: none">
                            {!!form::select('categoria',['' => 'Select categoria','1' => '--------','2' => 'llantas','3' => 'sistema electrico','4' => 'motores'],null,['class'=>'form-control'])!!}
                        </div>

                        <div class="col-lg-2 col-sm-2" style="display: none">
                            {!!form::select('marca',['' => 'Select marca','1' => '--------','2' => 'Yamaha','3' => 'zuzuki','4'=>'taiwan'],null,['class'=>'form-control'])!!}
                        </div>

                        <div class="col-lg-2 col-sm-2" style="display: none">
                            {!!form::select('modelo',['' => 'Select modelo','1' => '--------','2' => 'pistera','3' => 'cgl 110','4'=>'chacarera'],null,['class'=>'form-control'])!!}
                        </div>
                        <div class="col-lg-2">
                            {!!form::select('tipo',[
                            '1'=>'Producto',
                            '2'=>'Servicio'],null,['class'=>'form-control'])!!}
                        </div>
                        <div class="col-lg-2">
                            {!!form::select('estado',[
                            '1'=>'Activo',
                            '0'=>'Inactivo'],null,['class'=>'form-control'])!!}
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary btn-md"> Buscar
                                <i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>
                            </button>
                        </div>
                    </div>

                </div>
            {!! Form::close() !!}
        </div>


        <div class="box-body table-responsive no-padding col-lg-12">

            @if($tipo_producto['id']==1)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>TIPO</th>
                    <th>SERIE</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CATEGORIA</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr data-id="{{$producto->id}}" id="filaproducto{{$producto->id}}">
                        <td>{{$producto->tipoProducto->descripcion}}</td>
                        <td>{{$producto->serie}}</td>
                        <td><span id="texto{{$producto->id}}">{{$producto->nombre}}</span></td>
                        <td><span>S/. </span>{{$producto->precio}}</td>
                        <td>{{$producto->categoria->descripcion}}</td>
                        <td>{{$producto->modelo->marca->descripcion}}</td>
                        <td>{{$producto->modelo->descripcion}}</td>
                        @if($producto->estado == 1)
                            <td>Activo</td>
                        @else
                            <td>Inactivo</td>
                        @endif
                        @if($producto->estado == 1)
                        <td>
                            <a  onclick="eliminar('{{$producto->id}}')"    {{--onclick="eliminarPro('{{$producto->id}}')"--}}  style="color: red; font-size: 2rem; padding: 0.5rem; cursor: pointer; margin-right: 2rem">
                                <input type="hidden" name="eliminarproducto{{$producto->id}}" value="{{$producto->id}}"/>
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="/inventario/producto/editar/{{$producto->id}}" style="color: green;  font-size: 2rem; padding: 0.5rem">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        @else
                            <td>
                                <a href="/inventario/producto/editar/{{$producto->id}}" style="color: green;  font-size: 2rem; padding: 0.5rem">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>


            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>TIPO</th>
                        <th>SERIE</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr data-id="{{$producto->id}}" id="filaproducto{{$producto->id}}">
                            <td>{{$producto->tipoProducto->descripcion}}</td>
                            <td>{{$producto->serie}}</td>
                            <td><span id="texto{{$producto->id}}">{{$producto->nombre}}</span></td>
                            <td><span>S/. </span>{{$producto->precio}}</td>
                            @if($producto->estado == 1)
                                <td>Activo</td>
                            @else
                                <td>Inactivo</td>
                            @endif
                            @if($producto->estado == 1)
                                <td>
                                    <a onclick="eliminarPro('{{$producto->id}}')"  style="color: red; font-size: 2rem; padding: 0.5rem; cursor: pointer; margin-right: 2rem">
                                        <input type="hidden" name="eliminarproducto{{$producto->id}}" value="{{$producto->id}}"/>
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="/inventario/producto/editar/{{$producto->id}}" style="color: green;  font-size: 2rem; padding: 0.5rem">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="/inventario/producto/editar/{{$producto->id}}" style="color: green;  font-size: 2rem; padding: 0.5rem">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">
        {!! $productos->appends(Request::all())->render() !!}
        </div>

        <script>
            function eliminar(id) {
                $(document).ready(function(){
                    var texto = $("#texto"+id).text();
                    $("#texto_eliminar").text(texto);
                    $("#confirmar").attr('onclick','eliminarCategoria('+id+')');
                    $("#drop_porveedor").modal('show');
                });
            }
        </script>

        {{--javascript eliminar: cambiar de estado--}}
        <script type="text/javascript">
            function eliminarCategoria(id){
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
    @endsection
@endsection



