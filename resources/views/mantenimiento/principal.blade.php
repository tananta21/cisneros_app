@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')

        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/mantenimiento/principal">Principal</a>
                </li>
            </ul>
        </div>
        <div class="text-center" style="padding-top:.1rem; margin-top: 0">
            <h3 style="font-weight: bold">BIENVENIDOS A MANTENIMEINTO</h3>
        </div>
        <br>
        <div style="text-align:center" class=" col-md-12">
                <figure>
                    <img style=";width: 180px;height: 180px" src="{{url('/')}}/dist/img/mantenimiento.jpg">
                </figure>
            <hr style="height: .5px ; background-color: green; width: 50%"/>
        </div>

        <section class="col-lg-12" style=" padding-top:.8rem;padding-bottom: 20rem; text-align: center">
            <div class="dropdown col-lg-3" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Productos</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">tipo producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">categoria</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">marca</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">unidad de medida</a></li>
                </ul>
            </div>
            <div class="dropdown col-lg-3" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Clientes</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">tipo cliente</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">estado civil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">grado de instruccion</a></li>

                </ul>
            </div>
            <div class="dropdown col-lg-3" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Productos</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">tipo producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">categoria</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">marca</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">unidad de medida</a></li>
                </ul>
            </div>
            <div class="dropdown col-lg-3" >
                <button style="color:white;background-color:#1ab394;border: none" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span style="font-weight: bold">Productos</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">tipo producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">categoria</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">marca</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">unidad de medida</a></li>
                </ul>
            </div>
        </section>


        {{--<div class="col-lg-12" style="padding: 9px; text-align: center">--}}
            {{--<div class="col-lg-3">--}}
                {{--<div class="col-lg-12"><span><i style="font-size: 2.3rem" class="fa fa-cart-arrow-down" aria-hidden="true"> <span style="font-weight: bold">Productos</span></i></span></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Tipo Producto</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Categoria</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Marca</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Modelo</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Unidad Medida</button></div>--}}
            {{--</div>--}}

            {{--<div class="col-lg-3">--}}
                {{--<div class="col-lg-12"><span><i style="font-size: 2.3rem" class="fa fa-users" aria-hidden="true"> <span style="font-weight: bold">Clientes</span></i></span></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Tipo Cliente</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Estado Civil</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Grado de Instruccion</button></div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3">--}}
                {{--<div class="col-lg-12"><span><i style="font-size: 2.3rem" class="fa fa-cart-arrow-down" aria-hidden="true"> <span style="font-weight: bold">Productos</span></i></span></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Tipo.Prodct</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Categoria</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Marca</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Modelo</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Unidad.M</button></div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3">--}}
                {{--<div class="col-lg-12"><span><i style="font-size: 2.3rem" class="fa fa-cart-arrow-down" aria-hidden="true"> <span style="font-weight: bold">Productos</span></i></span></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Categoria</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Tipo.Prodct</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Categoria</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Marca</button></div>--}}
                {{--<div class="col-lg-12" style=" padding-top: .5rem"><button style="text-align:center;   width:170px; height:45px" type="button" class="btn btn-w-m btn-success color-btn hover-1">Unidad.M</button></div>--}}
            {{--</div>--}}
        {{--</div>--}}

@endsection



