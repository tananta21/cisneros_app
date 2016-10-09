@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/seguridad/usuario">Usuarios</a>
            </li>
        </ul>
    </div>

    <script>
        $(document).ready(function () {
            $("#modulo-seguridad").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <h3 class="col-lg-3" style="margin-bottom: 0.5rem">Usuarios</h3>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        <div class="col-lg-3" style="margin-bottom: 3rem">
            <a href="/seguridad/usuario/registro" {{--onclick="registrarCliente()"--}} type="button" class="btn btn-primary btn-sm"> NUEVO USUARIO
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
@endsection
@endsection
