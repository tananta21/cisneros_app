@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/venta/nuevaventa">Nueva Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lista Ventas</a>
            </li>
        </ul>
    </div>
@section('contenido_modulos')
    <div>
        {{--barra  menu--}}
        <div class="col-lg-12">
            <div class="col-lg-9">
                <h4>Gestor de Ventas</h4>
            </div>
            <div class="col-lg-3">
                <button>Imprimir</button>
                <button>Imprimir</button>
            </div>
        </div>
        {{--cuerpo de gestor de venta--}}
        <div class="col-lg-12">
            <div class="col-lg-12">
                <span><i class="fa fa-info fa-1x"></i> Venta realizada con Exito </span>
            </div>
        </div>
    </div>


@endsection
@endsection


