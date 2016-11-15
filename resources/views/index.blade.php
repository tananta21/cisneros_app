
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CISNEROS SAC</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/')}}/cisnero/css/nuestro.css">
    <link rel="stylesheet" href="{{url('/')}}/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/')}}/dist/css/skins/_all-skins.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/ionicons/css/ionicons.css"/>
    <link rel="stylesheet" href="{{url('/')}}/font-awesome/css/font-awesome.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="{{url('/')}}/datatable/jquery.dataTables.min.css">
    <!-- jQuery 2.2.0 -->
    {{--<script src="{{url('/')}}/plugins/jQuery/jQuery-2.2.0.min.js"></script>--}}
    <script src="{{url('/')}}/js/jquery-2.1.1.js"></script>
    <script src="{{url('/')}}/datatable/jquery.dataTables.min.js"></script>
    <!-- Bootstrap 3.3.6 -->

    <script src="{{url('/')}}/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    {{--<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="{{url('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet">--}}

    <link href="{{url('/')}}/css/animate.css" rel="stylesheet">
    {{--<link href="{{url('/')}}/css/style.css" rel="stylesheet">--}}

    <script src="{{url('/')}}/dist/js/app.min.js"></script>


    <link rel="stylesheet" href="{{url('/')}}/dist/css/skins/skin-blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
</head>
<!--

=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------f------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Cisneros </b>SAC</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->

                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{url('/')}}/dist/img/perfil2.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{url('/')}}/dist/img/perfil2.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                    <small>System Engineer</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                {{--<div class="pull-left">--}}
                                {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                                {{--</div>--}}
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('/')}}/dist/img/perfil2.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info" style="text-align: center">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#" style="text-transform: uppercase;
                    ">{{Auth::user()->tipoEmpleado->descripcion}}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                {{--<li class="header">HEADER</li>--}}
                <!-- Optionally, you can add icons to the links -->
                {{--<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}
                {{--<li id="modulo-inventario" class="treeview">--}}
                    {{--<a href="/inventario/productos"><i class="fa fa-pencil-square-o"></i> <span>Inventario</span></a>--}}
                {{--</li>--}}
                {{--<li id="modulo-compra" class="treeview">--}}
                    {{--<a href="/compra/compranueva"><i class="fa fa-shopping-cart"></i> <span>Compras</span> </a>--}}
                {{--</li>--}}
                {{--<li id="modulo-venta" class="treeview">--}}
                    {{--<a href="/venta/nuevaventa"><i class="fa fa-money"></i> <span>Ventas</span> </a>--}}
                {{--</li>--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#"><i class="fa fa-bar-chart"></i> <span>Reportes</span> </a>--}}
                {{--</li>--}}
                {{--<li id="modulo-seguridad" class="treeview">--}}
                    {{--<a href="/seguridad/empleado"><i class="fa fa-lock"></i> <span>Seguridad</span> </a>--}}
                {{--</li>--}}
                {{--@foreach(\App\Core\Modulo\Modulo::where('id_padre',null)->get() as $modulo)--}}
                {{--<li id="modulo-mantenimiento" class="treeview">--}}
                    {{--<a href="/mantenimiento/principal"><i class="fa fa-cogs"></i> <span>{{$modulo->descripcion}}</span> </a>--}}
                {{--</li>--}}

                {{--</li>--}}
                {{--@foreach(\App\Core\Modulo\Modulo::where('id_padre',null)->get() as $modulo)--}}
                {{--<li id="modulo-mantenimiento" class="treeview">--}}
                    {{--<a href="/mantenimiento/principal"><i class="fa fa-cogs"></i> <span>{{$modulo->descripcion}}</span> </a>--}}
                {{--</li>--}}

                {{--@endforeach--}}

                {{--MENU DE LOS MODULOS DEL SISTEMA--}}

                 @include('acceso.modulos')

            </ul>

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
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content animated fadeInRight" style="background:#f3f3f4 ">

                <div class="wrapper wrapper-content animated fadeInRight" id="caja-principal">

                    @section('vistainicial')
                        <div style="padding-top: 2rem">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>S/.350.00</h3>

                                        <p>Egresos Compras</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Ir a Compras <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>S/.557.00</h3>

                                    <p>Ingresos Ventas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">Ir a Ventas <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Simple one line Example </h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div id="morris-one-line-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="949" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="35.84375" y="307.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,307.5H924" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="236.875" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7.5</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,236.875H924" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="166.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,166.25H924" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="95.625" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22.5</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,95.625H924" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="35.84375" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text><path fill="none" stroke="#aaaaaa" d="M48.34375,25H924" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="924" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan></text><text x="799.0040941533047" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan></text><text x="674.0081883066093" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="548.6698279233476" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="423.67392207665233" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><text x="298.67801622995694" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="173.68211038326163" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan></text><text x="48.34375" y="320" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><path fill="none" stroke="#1ab394" d="M48.34375,260.4166666666667C79.6783400958154,248.64583333333334,142.34752028744623,216.86941404468766,173.68211038326163,213.33333333333334C204.93108684493546,209.80691404468766,267.42903976828313,246.29166666666669,298.67801622995694,232.16666666666669C329.9269926916308,218.04166666666669,392.42494561497847,100.33333333333334,423.67392207665233,100.33333333333334C454.92289853832614,100.33333333333334,517.4208514616738,222.75859184914844,548.6698279233476,232.16666666666669C611.2533944808368,251.00859184914844,736.4205275958154,208.6228520377129,799.0040941533047,213.33333333333334C830.2530706149785,215.6853520377129,892.7510235383262,248.64583333333334,924,260.4166666666667" stroke-width="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="48.34375" cy="260.4166666666667" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="173.68211038326163" cy="213.33333333333334" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="298.67801622995694" cy="232.16666666666669" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="423.67392207665233" cy="100.33333333333334" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="548.6698279233476" cy="232.16666666666669" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="799.0040941533047" cy="213.33333333333334" r="5" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="924" cy="260.4166666666667" r="8" fill="#1ab394" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 889px; top: 193px;"><div class="morris-hover-row-label">2015</div><div class="morris-hover-point" style="color: #1ab394">
                                                Value:
                                                5
                                            </div></div></div>
                                </div>
                            </div>
                        </div>
                    @show

                    @yield('menu_modulos')

                    @yield('contenido_modulos')


            </div>


        </section>
        <!-- /.content -->

    </div>

    {{--modal crear categoria--}}
    <div class="container">        <!-- Modal crear -->
        <div class="modal fade " id="categoria_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="gridModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrar Nueva Categoria</h4>
                    </div>
                    <div class="modal-body">
                        {{--formulario crear--}}
                        <div class="box box-primary">
                            <form action="/categoria/registrar"  method="GET"  id="form-categoria"  class="form-horizontal" role="form">
                                {!! csrf_field() !!}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-2 control-label">Categoria</label>
                                        <div class="col-md-6">
                                            <input id="idcat" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Categoria" name="descripcion_categoria">
                                            <span style="font-size: 1.2rem; color: #0000ff; padding-left: 0.3rem">Maximo 30 caracteres</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input id=""  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                            <input id="" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="box-footer" style="text-align: center">
                                    {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button href="" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--modal crear marca--}}
    <div class="container">        <!-- Modal crear -->
        <div class="modal fade " id="marca_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="gridModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrar Nueva Marca</h4>
                    </div>
                    <div class="modal-body">
                        {{--formulario crear--}}
                        <div class="box box-primary">
                            <form action="/marca/registrar"  method="GET"  id="form-marca"  class="form-horizontal" role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-2 control-label">Marca</label>
                                        <div class="col-md-6">
                                            <input id="idmar" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Marca" name="descripcion_marca">
                                            <span style="font-size: 1.2rem; color: #0000ff; padding-left: 0.3rem">Maximo 30 caracteres</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input id=""  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                            <input id="" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="box-footer" style="text-align: center">
                                    {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button href="" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                                </div>

                                <!-- /.box-body -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--modal crear modelo--}}
    <div class="container">        <!-- Modal crear -->
        <div class="modal fade " id="modelo_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="gridModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrar Nuevo Modelo</h4>
                    </div>
                    <div class="modal-body">
                        {{--formulario crear--}}
                        <div class="box box-primary">
                            <form action="/modelo/registrar"  method="GET"  id="form-modelo"  class="form-horizontal" role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-2 control-label">Modelo</label>
                                        <div class="col-md-6">
                                            <input id="idmod" required="true" maxlength="50" type="text" class="form-control"  placeholder="Nombre Modelo" name="descripcion_modelo">
                                            <span style="font-size: 1.2rem; color: #0000ff; padding-left: 0.3rem">Maximo 50 caracteres</span>
                                        </div>
                                        <div class="col-md-4">
                                            <input id="activo"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                                            <input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-2 control-label">Marca</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="marca_id" id="marcas-modelos">
                                                <option value="1">Seleccione Marca</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer" style="text-align: center">
                                    {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button href="" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                                </div>

                                <!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">        <!-- Modal crear -->
        <div class="modal fade " id="drop_porveedor" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div  style="text-align: center">
                        <h2 style="color: red" class="modal-title">Advertencia</h2>
                    </div>
                    <div class="modal-body">
                        {{--formulario crear --}}
                        <div class="box box-primary" style="border-top-color: red;">
                            <P style="text-align: center;padding-top: 1rem;font-size:2rem">
                                Esta seguro de eliminar a (<span  style="font-weight: bold" id="texto_eliminar"></span>)
                            </P>
                        </div>

                        <div class="box-footer" style="text-align: center">
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            <button  id="confirmar"  style="background: red;border: none;" class="btn btn-info" data-dismiss="modal" >Eliminar</button>
                            <button style="background-color:#a9a9a9;border:none " href="" class="btn btn-info" data-dismiss="modal" >Cancelar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--script para permitir solo letras y numeros--}}
    <script type="text/javascript">

        function soloLetras(e) {
            key = e.keyCode || e.which;
            if(key == 46 || key == 39){
                return false;
            }
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        function solonumeros(e) {
            key = e.keyCode || e.which;
            if(key == 46 || key == 39){
                return false;
            }
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "1234567890";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        $(document).ready(function() {
            $('#categoria_modal').on('shown.bs.modal',
                    function () {
                        $('#idcat').focus();
                    });
            $('#marca_modal').on('shown.bs.modal',
                    function () {
                        $('#idmar').focus();
                    });
            $('#modelo_modal').on('shown.bs.modal',
                    function () {
                        $('#idmod').focus();
                    });

        });

    </script>

    {{--script de ubigeos--}}
    <script>
        function buscarProvincia(id){
            if(id !=0 ){
                $("#provincias").removeAttr('readonly');
                $("#provincias").empty();
                $("#distritos").empty();
                $("#distritos").append('<option value="0">Seleccione Distrito</option>');
                var nro_ubigeo = id.substr(0,2);
                console.log(nro_ubigeo)
                var url = '{{route("buscar.provincia")}}';

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        ubigeo : nro_ubigeo
                    },
                    dataType: 'JSON',
//
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta){
                        $("#provincias").attr("name","distrito");

                        $("#distritos").removeAttr('name');
                        for(var i in respuesta){
                            if(respuesta[i].provincia == ''){
                                $("#provincias").append('<option value="'+respuesta[i].id+'">Seleccione Provincia</option>');
                            }
                            else{
                                $('#provincias').append('<option value="'+respuesta[i].numubigeo+'">'+respuesta[i].provincia+'</option>');
                            }
                        }
                    }
                });


            }
            else{
                $("#provincias").attr('readonly','true');
                $("#provincias").empty();
                $("#provincias").append('<option value="0">Seleccione Provincia</option>');
                $("#distritos").attr('readonly','true');
                $("#distritos").empty();
                $("#distritos").append('<option value="0">Seleccione Distrito</option>');

            }
        }

        function buscarDistrito(id){
            if(id !=0 ){
                $("#distritos").removeAttr('readonly');
                $("#distritos").empty();
                var nro_ubigeo = id.substr(0,4)
                var url = '{{route("buscar.distrito")}}';
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        ubigeo : nro_ubigeo
                    },
                    dataType: 'JSON',
//
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta){
                        $("#distritos").attr("name","distrito");
                        $("#provincias").removeAttr('name');
                        for(var i in respuesta){
                            if(respuesta[i].distrito == ''){
                                $("#distritos").append('<option value="'+respuesta[i].id+'">Seleccione Distrito</option>');
                            }
                            else{
                                $('#distritos').append('<option value="'+respuesta[i].id+'">'+respuesta[i].distrito+'</option>');
                            }
                        }
                    }
                });


            }
            else{
                $("#distritos").attr('readonly','true');
                $("#distritos").empty();
                $("#distritos").append('<option value="0">Seleccione Distrito</option>');

            }
        }
    </script>

    {{--script de los extends   en el registro de productos--}}
    {{--categoria - marca - modelo--}}
    <script>
        $(document).ready(function() {
            $("#form-categoria").submit(function() {
                var form = $('#form-categoria');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        descripcion_categoria: $(this).find( 'input[name="descripcion_categoria"]' ).val(),
                        estado: $(this).find( 'input:radio[name=estado]:checked' ).val()
//                        legajo: $("#legajo").val(),
//                            "_token": $(this).find( 'input[name="_token"]' ).val()
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        $("#categorias").append('<option value="'+respuesta.id+'">'+respuesta.descripcion+'</option>');
                        $('#idcat').val("");
                        $('#categoria_modal').modal('hide');

                    }
                });
                return false;
            });

            $("#form-marca").submit(function() {
                var form = $('#form-marca');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        descripcion_marca: $(this).find( 'input[name="descripcion_marca"]' ).val(),
                        estado: $(this).find( 'input:radio[name=estado]:checked' ).val()
//                        legajo: $("#legajo").val(),
//                            "_token": $(this).find( 'input[name="_token"]' ).val()
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        $("#marcas").append('<option value="'+respuesta.id+'">'+respuesta.descripcion+'</option>');
                        $('#idmar').val("");
                        $('#marca_modal').modal('hide');

                    }
                });
                return false;
            });

            $("#form-modelo").submit(function() {
                var form = $('#form-modelo');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        descripcion_modelo: $(this).find( 'input[name="descripcion_modelo"]' ).val(),
                        marca_id:$(this).find('select[name=marca_id]').val(),
                        estado: $(this).find( 'input:radio[name=estado]:checked' ).val()
//                        legajo: $("#legajo").val(),
//                            "_token": $(this).find( 'input[name="_token"]' ).val()
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
//                        $("#marcas").append('<option value="'+respuesta.id+'">'+respuesta.descripcion+'</option>');
                        $('#idmod').val("");
                        $('#modelo_modal').modal('hide');

                        var id = ($('#marcas').val());
                        window.onload = buscarModelo(id) ;

                    }
                });
                return false;
            });

        });
    </script>

    {{--script solo numeros con dos decimales--}}
    <script LANGUAGE="JavaScript">
        function NumCheck(e, field) {
            key = e.keyCode ? e.keyCode : e.which
            // backspace
            if (key == 8) return true
            // 0-9
            if (key > 47 && key < 58) {
                if (field.value == "") return true
                regexp = /.[0-9]{4}$/
                return !(regexp.test(field.value))
            }
            // .
            if (key == 46) {
                if (field.value == "") return false
                regexp = /^[0-9]+$/
                return regexp.test(field.value)
            }
            // other key
            return false

        }
    </script>


    {{--script buscar modelos en registrar producto--}}
    <script>
        function buscarModelo(id){
            if(id !=1 ){
                $("#modelos").removeAttr('readonly');
//                $("#agregar_modelo").css('display','block');
                $("#modelos").empty();

                var nro_ubigeo = id;
                var url = '{{route("buscar.modelos")}}';
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        marca : nro_ubigeo
                    },
                    dataType: 'JSON',
                    //
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta){

                        if(jQuery.isEmptyObject(respuesta)){
                            $("#modelos").append('<option value="1">No Existen Modelos</option>');
                        }
                        else{
                            $("#modelos").append('<option value="1">Seleccione Modelo</option>');
                            for(var i in respuesta){
                                $('#modelos').append('<option value="'+respuesta[i].id+'">'+respuesta[i].descripcion+'</option>');

                            }
                        }
                    }
                });
            }
            else{
                $("#modelos").empty();
                $("#modelos").attr('readonly','true');
//                $("#agregar_modelo").css('display','none');
                $("#modelos").append('<option value="1">Seleccione Modelo</option>');
            }
        }

    </script>

    {{--script buscar marcas en registrar modelo en producto--}}
    <script>
        function buscarMarcas(){
            var url = '{{route("buscar.marcas")}}';
            $("#marcas-modelos").empty();
            $.ajax({
                type: 'GET',
                url: url,
                data: {

                },
                dataType: 'JSON',
                //
                error: function() {
                    $("#respuesta").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta){

                    $("#modelo_modal").modal('show');

                    if(jQuery.isEmptyObject(respuesta)){
                        $("#marcas-modelos").append('<option value="1">No Existen Marcas</option>');
                    }
                    else{
                        $("#marcas-modelos").append('<option value="1">Seleccione Marcas</option>');
                        for(var i in respuesta){
                            $('#marcas-modelos').append('<option value="'+respuesta[i].id+'">'+respuesta[i].descripcion+'</option>');

                        }
                    }
                }
            });
        }
    </script>

    {{--SCRIPT COMPROBAR DOCUMENTO DE PROVEEDOR--}}
    <script>
        function comprobarDocumento(val){
            if(val.length == 2){
                if(val ==10 ){
                    $("#tipo_proveedor").val("NATURAL");
                    $("#error_documento").css("display","none");
                }
                else if(val ==20 ){
                    $("#tipo_proveedor").val("JURIDICO");
                    $("#error_documento").css("display","none");
                }
                else{
                    console.log("error");
                    $("#error_documento").css("display","block");
                    $("#documento").val("");
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
                    $('#marca').DataTable( {
                        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
                        "order": [[ 0, "desc" ]],
                        "lengthChange":false,
                        "language": {
                            "sSearch": "<span style='font-size: 1.5rem'>Buscar Registro</span>",
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

    {{--datatable clientes  evaluacion crediticia--}}

    <script type="text/javascript">
        $(document).ready(function() {
                    $('#cliente').DataTable( {
                        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
                        "order": [[ 0, "desc" ]],
//                        "bFilter": false,
//                        "lengthChange":false,
                        "language": {
                            "sSearch": "<span style='font-size: 1.5rem'>Buscar Registro</span>",
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

    {{--fecha venta--}}
    <script>
        $(document).ready(function() {
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1; //hoy es 0!
            var yyyy = hoy.getFullYear();

            if(dd<10) {
                dd='0'+dd
            }

            if(mm<10) {
                mm='0'+mm
            }

            hoy = dd+'/'+mm+'/'+yyyy;

            $("#fecha_venta").val(hoy);
        });
    </script>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" >

    </aside>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->



{{--<script src="{{url('/')}}/js/jquery.min.js"></script>--}}
</body>
</html>
