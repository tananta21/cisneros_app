
{{--<!DOCTYPE html>--}}
{{--<html>--}}

{{--<head>--}}

    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

    {{--<title>CISNEROS SAC</title>--}}

    {{--<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="{{url('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet">--}}

    {{--<link href="{{url('/')}}/css/animate.css" rel="stylesheet">--}}
    {{--<link href="{{url('/')}}/css/style.css" rel="stylesheet">--}}

{{--</head>--}}

{{--<body>--}}

{{--<div id="wrapper">--}}

    {{--<nav class="navbar-default navbar-static-side" role="navigation">--}}
        {{--<div class="sidebar-collapse">--}}
            {{--<ul class="nav metismenu" id="side-menu">--}}
                {{--<li class="nav-header">--}}
                    {{--<div class="dropdown profile-element">--}}
                        {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                            {{--<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>--}}
                             {{--</span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>--}}
                        {{--<ul class="dropdown-menu animated fadeInRight m-t-xs">--}}
                            {{--<li><a href="">Logout</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="logo-element">--}}
                        {{--IN+--}}
                    {{--</div>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a href="/inventario/productos"><i class="fa fa-th-large"></i> <span class="nav-label">Inventario</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="/compra/nuevacompra"><i class="fa fa-th-large"></i> <span class="nav-label">Compras</span> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Ventas</span> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Caja</span> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Reportes</span> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Seguridad</span> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Mantenimientos</span> </a>--}}
                {{--</li>--}}


            {{--</ul>--}}

        {{--</div>--}}
    {{--</nav>--}}

        {{--<div id="page-wrapper" class="gray-bg">--}}
            {{--<div class="row border-bottom">--}}
                {{--<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">--}}
                    {{--<div class="navbar-header">--}}
                        {{--<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>--}}
                        {{--<form role="search" class="navbar-form-custom" method="post" action="#">--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<ul class="nav navbar-top-links navbar-right">--}}
                        {{--<li>--}}
                            {{--<a href="/auth/logout">--}}
                                {{--<i class="fa fa-sign-out"></i> Log out--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
    {{----}}
                {{--</nav>--}}
            {{--</div>--}}
            {{--@yield('menu_modulos')--}}
            {{--<div class="wrapper wrapper-content animated fadeInRight">--}}
    {{----}}
    {{----}}
            {{--@yield('contenido_modulos')--}}
    {{----}}
    {{----}}
            {{--</div>--}}
            {{--<div class="footer">--}}
                {{--<div class="pull-right">--}}
                    {{--10GB of <strong>250GB</strong> Free.--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<strong>Copyright</strong> Example Company &copy; 2014-2015--}}
                {{--</div>--}}
            {{--</div>--}}
    {{----}}
        {{--</div>--}}
    {{--</div>--}}

{{--<!-- Mainly scripts -->--}}
{{--<script src="{{url('/')}}/js/jquery-2.1.1.js"></script>--}}
{{--<script src="{{url('/')}}/js/bootstrap.min.js"></script>--}}
{{--<script src="{{url('/')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>--}}
{{--<script src="{{url('/')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>--}}

{{--<!-- Custom and plugin javascript -->--}}
{{--<script src="{{url('/')}}/js/inspinia.js"></script>--}}
{{--<script src="{{url('/')}}/js/plugins/pace/pace.min.js"></script>--}}


{{--</body>--}}

{{--</html>--}}


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CISNEROS SAC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{url('/')}}/font-awesome/css/font-awesome.min.css"/>
    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
    <link rel="stylesheet" href="{{url('/')}}/plugins/ionicons.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/AdminLTE.css">
    <!-- jQuery 2.2.0 -->
    <script src="{{url('/')}}/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{url('/')}}/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    {{--<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="{{url('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet">--}}

    <link href="{{url('/')}}/css/animate.css" rel="stylesheet">
    {{--<link href="{{url('/')}}/css/style.css" rel="stylesheet">--}}

    <script src="{{url('/')}}/dist/js/app.min.js"></script>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/skins/skin-blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
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
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Cisneros</b>SAC</span>
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
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-envelope-o"></i>--}}
                            {{--<span class="label label-success">4</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 4 messages</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the messages -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start message -->--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<!-- User Image -->--}}
                                                {{--<img src="{{url('/')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<!-- Message title and timestamp -->--}}
                                            {{--<h4>--}}
                                                {{--Support Team--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                                            {{--</h4>--}}
                                            {{--<!-- The message -->--}}
                                            {{--<p>Why not buy a new awesome theme?</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end message -->--}}
                                {{--</ul>--}}
                                {{--<!-- /.menu -->--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                        {{--</ul>--}}
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 10 notifications</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner Menu: contains the notifications -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start notification -->--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end notification -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-flag-o"></i>--}}
                            {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 9 tasks</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner menu: contains the tasks -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<!-- Task title and progress text -->--}}
                                            {{--<h3>--}}
                                                {{--Design some buttons--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<!-- The progress bar -->--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<!-- Change the css width attribute to simulate progress -->--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
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
                                    <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
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

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('/')}}/dist/img/perfil2.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                {{--<li class="header">HEADER</li>--}}
                <!-- Optionally, you can add icons to the links -->
                {{--<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>--}}
                <li class="treeview">
                    <a href="/inventario/productos"><i class="fa fa-link"></i> <span>Inventario</span></a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Compras</span> </a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Ventas</span> </a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Reportes</span> </a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Seguridad</span> </a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Mantenimientos</span> </a>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content animated fadeInRight" style="background:#f3f3f4 ">

                <div class="wrapper wrapper-content animated fadeInRight">
                    @yield('menu_modulos')

                    @yield('contenido_modulos')


            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    {{--<footer class="main-footer">--}}

    {{--</footer>--}}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
