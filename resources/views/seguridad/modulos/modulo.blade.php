@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <script>
        $(document).ready(function () {
            $("#modulo-seguridad").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div>
        <div class="col-lg-12">
            <h3 class="col-lg-12">Gestor de modulos del Sistema</h3>
        </div>
    </div>

    <div class="col-lg-12" style="margin-top: 3rem">
        <div class="box-body table-responsive no-padding col-lg-12">
            <table id="marca" class=" table table-hover display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>N° ID</th>
                    <th>DESCRIPCION CATEGORIA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr data-id="{{$categoria->id}}" id="filaproducto{{$categoria->id}}">
                        <td>{{$categoria->id}}</td>
                        <td><span id="texto{{$categoria->id}}">{{$categoria->descripcion}}</span></td>
                        @if($categoria->estado == 1)
                            <td>Activo <i class="fa fa-check-circle-o " style="color: green"></i></td>
                        @else
                            <td>Inactivo <i class="fa fa-check-circle-o " style="color: orange"></i></td>
                        @endif
                        <td>
                            @if($categoria->estado == 1)
                                <a onclick="eliminarCategoria('{{$categoria->id}}')" style="color: red; font-size: 2.5rem; padding: 0.5rem; cursor: pointer; margin-right: 2rem">
                                    <input type="hidden" name="eliminarmarca{{$categoria->id}}" value="{{$categoria->id}}"/>
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a id="editar_marca{{$categoria->id}}" onclick="editarCategoria('{{$categoria->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                    <input type="hidden" name="editarcategoria{{$categoria->id}}" value="{{$categoria->id}}"/>
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @else
                                <a id="editar_marca{{$categoria->id}}" onclick="editarCategoria('{{$categoria->id}}')" style="cursor:pointer; color: green;  font-size: 2.5rem; padding: 0.5rem">
                                    <input type="hidden" name="editarcategoria{{$categoria->id}}" value="{{$categoria->id}}"/>
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @endif


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@endsection
