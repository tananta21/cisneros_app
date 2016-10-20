@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
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
    <div class="col-lg-12">
        <h3 class="col-lg-8" style="margin-bottom: 0.5rem;">Gestor de Productos y Servicios.</h3>

        <div  style="text-align: center; color: #000000; font-weight: bold">
            @if($tipo_producto['id']==1)
                <h4 class="col-lg-2" style="background:#75cda7; padding: 0.5rem"> Productos</h4>
                <h4 class="col-lg-2" style=" padding: 0.5rem"> Servicios</h4>
            @else
                <h4 class="col-lg-2" style=" padding: 0.5rem"> Productos</h4>
                <h4 class="col-lg-2" style="background:#cdabbb; padding: 0.5rem"> Servicios</h4>
            @endif
        </div>

    </div>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>


    <div class="col-lg-12" style="margin-top: 0.1rem">
        <div class="col-lg-12" style="font-weight: bold">
            <span class="col-lg-2">Tipo Producto : </span>
            <span class="col-lg-2">Estado Producto : </span>
        </div>

        {!! Form::model(Request::all(),['route'=>'buscar.producto','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
        <div class="box-body">
            <div class="form-group">
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
                <div class="col-lg-5">
                    <a data-toggle="modal" href="/inventario/producto/nuevoproducto" style="font-size: 1.6rem">
                        <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i> <span style="color: #000000">Agregar Nuevo Registro</span>
                    </a>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(document).ready(function() {
                    $('#example').DataTable( {
                        "lengthChange": false,
                        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "sSearch": "<span style='font-size: 1.5rem'>Buscar </span>",
                            "lengthMenu": "Mostrar _MENU_ resultados",
                            "emptyTable":     "No se encontraron resultados",
                            "info":           "Se Muestran _START_ a _END_ de _TOTAL_ resultados",
                            "infoEmpty":      "Se muestran 0 resultados",
                            "paginate": {
                                "first":      "Primero",
                                "last":       "Ultimo",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                            }
                        }
                    });
                }
        );
    </script>
    <div class="box-body table-responsive no-padding col-lg-12">
        @if($tipo_producto['id']==1)
                <table id="example" class=" table table-hover display" cellspacing="0" width="100%">
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
                        <td><span style="background:#75cda7">{{$producto->tipoProducto->descripcion}}</span></td>
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
                <table id="example" class=" table table-hover display" cellspacing="0" width="100%">
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
                        <td><span style="background:#cdabbb">{{$producto->tipoProducto->descripcion}}</span></td>
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