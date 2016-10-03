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
    <div  style="padding-top: 2rem" class="col-lg-12">
        <nav  class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    </button>
                    <a class="navbar-brand"><i style=" color:white;font-size:2rem;padding-right: 1rem" class="fa fa-cart-plus"></i><span style="font-size: 2rem; color: white">Gestor de Ventas</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><i style="color: white; padding-right:1rem" class=" fa fa-print"><span class="gestor" style="color: white"> imprimir</span></i></a></li>
                    <li><a href="/venta/nuevaventa"><i style="color: white; padding-right:1rem" class=" fa fa-plus"><span style="color: white"> nueva venta</span></i></a></li>
                    <li><a href=""><i style="color: white; padding-right:1rem" class=" fa fa-question-circle"><span style="color: white"> ayuda</span></i></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
    </nav>

    </div>


    <div class="container col-lg-12">
        <div class="col-lg-6">
            <div style="padding-top:1rem">

                <div style=" border:#1ab394 2px solid;background-color: #1ab394;padding-top: 1rem;padding-bottom: 1rem"><h4 style="font-weight:bold;color:white;text-align: center">total apagar</h4></div>
                <div style="border: #ebebeb 2px solid"><span><h3 style="text-align: center">$720</h3></span></div>
            </div>

            <div style="padding-top:1rem">

                <div style=" border: #ebebeb 2px solid;background-color: #1ab394;padding-top: 1rem;padding-bottom: 1rem"><h4 style="font-weight:bold;color:white;text-align: center">Importe recibido</h4></div>
                <div style="border: #ebebeb 2px solid"><span><h3 style="text-align: center">$720</h3></span></div>
            </div>

            <div style="padding-top:1rem;padding-bottom: 2rem">

                <div style=" border: #ebebeb 2px solid;background-color: #1ab394;padding-top: 1rem;padding-bottom: 1rem"><h4 style="font-weight:bold;color:white;text-align: center">Cambio</h4></div>
                <div style="border: #ebebeb 2px solid"><span><h3 style="text-align: center">$720</h3></span></div>
            </div>

        </div>
        <div class="col-lg-6">

        </div>
    </div>

@endsection
@endsection


