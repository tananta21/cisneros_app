@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <script>
        $(document).ready(function () {
            $("#modulo-mantenimiento").addClass('active');
        });
    </script>
@section('contenido_modulos')

    <div id="lista_cliente">
        <div class="col-lg-12">
            <div class="col-lg-10">
                <h3 class="col-lg-4" style="margin-bottom: 0.5rem;padding-left: 0">Gestor de Ubigeos</h3>
            </div>

        </div>
        <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
        {{--<div class="col-lg-12" style="margin-top: 0.5rem">--}}

        {{--{!! Form::model(Request::all(),['route'=>'buscar.ubigeo','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}--}}
        {{--<div class="box-body">--}}
        {{--<div class=" form-group">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div  --}}{{--style="padding-left: 0rem"--}}{{-- class="col-lg-10">--}}
        {{--<button type="submit" class="btn btn-primary btn-sm col-lg-1"> Buscar--}}
        {{--<i class="fa fa-search fa-1px" style="margin-left: 1rem"></i>--}}
        {{--</button>--}}
        {{--<div class="col-lg-3 col-sm-2">--}}
        {{--<input type="text" class="form-control" placeholder="Serie Producto" name="serie" value>--}}
        {{--{!!form::text('cliente',null,['class'=>'form-control', 'placeholder'=>'Ingrese N° de Ubigeo','required'=>'true'])!!}--}}
        {{--</div>--}}
        {{--<div class="col-lg-1 col-sm-2">--}}
        {{--<a type="button" href="/mantenimiento/ubigeo" class="btn btn-default" > <i class="fa fa-refresh fa-1x"></i></a>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--{!! Form::close() !!}--}}

        {{--</div>--}}

    </div>



    <div class="box-body table-responsive no-padding col-lg-12">
        <table id="marca" class=" table table-hover display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>N° ID</th>
                <th>N° UBIGEO</th>
                <th>DEPARTAMENTO</th>
                <th>PROVINCIA</th>
                <th>DISTRITO</th>
                <th>ESTADO</th>
                <th>VER</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ubigeos as $ubigeo)
                <tr data-id="{{$ubigeo->id}}" id="filaproducto{{$ubigeo->id}}">
                    <td>{{$ubigeo->id}}</td>
                    <td><span id="numubigeo{{$ubigeo->id}}">{{$ubigeo->numubigeo}}</span></td>
                    <td><span id="departamento{{$ubigeo->id}}">{{$ubigeo->departamento}}</span></td>
                    <td><span id="provincia{{$ubigeo->id}}">{{$ubigeo->provincia}}</span></td>
                    <td><span id="distrito{{$ubigeo->id}}">{{$ubigeo->distrito}}</span></td>
                    <td><i class="fa fa-check-circle-o " style="color: green"></i></td>
                    <td><a  onclick="verUbigeo('{{$ubigeo->id}}')" href="" data-toggle="modal" data-target="#ver_ubigeo_modal"><i class="fa fa-eye " style="color: red; font-size: 2.4rem"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--<div class="box-body table-responsive no-padding col-lg-12">--}}
    {{--<table class="table table-hover">--}}
    {{--<thead>--}}
    {{--<tr >--}}
    {{--<th>N° ID</th>--}}
    {{--<th>N° UBIGEO</th>--}}
    {{--<th>DEPARTAMENTO</th>--}}
    {{--<th>PROVINCIA</th>--}}
    {{--<th>DISTRITO</th>--}}
    {{--<th>ESTADO</th>--}}
    {{--<th>VER</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach($ubigeos as $ubigeo)--}}
    {{--<tr data-id="{{$ubigeo->id}}" id="filaproducto{{$ubigeo->id}}">--}}
    {{--<td>{{$ubigeo->id}}</td>--}}
    {{--<td><span id="numubigeo{{$ubigeo->id}}">{{$ubigeo->numubigeo}}</span></td>--}}
    {{--<td><span id="departamento{{$ubigeo->id}}">{{$ubigeo->departamento}}</span></td>--}}
    {{--<td><span id="provincia{{$ubigeo->id}}">{{$ubigeo->provincia}}</span></td>--}}
    {{--<td><span id="distrito{{$ubigeo->id}}">{{$ubigeo->distrito}}</span></td>--}}
    {{--<td><i class="fa fa-check-circle-o " style="color: green"></i></td>--}}
    {{--<td><a  onclick="verUbigeo('{{$ubigeo->id}}')" href="" data-toggle="modal" data-target="#ver_ubigeo_modal"><i class="fa fa-eye " style="color: red; font-size: 2.4rem"></i></a></td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    <script>
        function verUbigeo(id){
            var texto_numubigeo = $("#numubigeo"+id).text();
            $("#desc_numubigeo").text(texto_numubigeo);
            var texto_departamento = $("#departamento"+id).text();
            $("#desc_departamento").text(texto_departamento);
            var texto_provincia = $("#provincia"+id).text();
            $("#desc_provincia").text(texto_provincia);
            var texto_distrito = $("#distrito"+id).text();
            $("#desc_distrito").text(texto_distrito);
        }
    </script>

    {{--<div class="col-lg-12" style="display: flex; flex-direction: row; justify-content: center;">--}}
    {{--{!! $ubigeos->appends(Request::all())->render() !!}--}}
    {{--</div>--}}

@endsection
@endsection
<div class="container">        <!-- Modal ver ubigeo -->
    <div class="modal fade " id="ver_ubigeo_modal" tabindex="-1"  role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubigeo</h4>
                </div>
                <div class="modal-body">
                    {{--Informacion del ubigeo --}}
                    <div class="box box-primary">
                        {!! Form::open(['action' => 'MantenimientoController@actualizarModelo','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">

                            <div class="ibox-content">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nº Ubigeo</th>
                                        <th>Departamento</th>
                                        <th>Provincia</th>
                                        <th>Distrito</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr >
                                        <td><span id="desc_numubigeo"></span></td>
                                        <td><span id="desc_departamento"></span></td>
                                        <td><span id="desc_provincia"></span></td>
                                        <td><span id="desc_distrito"></span></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
</div>