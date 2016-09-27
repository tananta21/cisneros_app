
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CISNEROS | Login</title>

    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{url('/')}}/css/animate.css" rel="stylesheet">
    <link href="{{url('/')}}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">MC</h1>

        </div>
        <h3>MULTISERVICIOS CISNEROS</h3>
        <p>Para poder ingresar al sistema usted debera autenticarse con sus datos registrados previamente por el administrador
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        {{--<a class=" " href="http://multiservicioscisneros.local/">Ir a Pagina Principal</a>--}}
        <form class="m-t" role="form" action="/login" method="post" >
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="email" class="form-control"  name="email" placeholder="Correo electronico" value="{{ old('email') }}" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password"  class="form-control" placeholder="Contraseña" required="">
            </div>
            @if (count($errors))
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger"><strong>{{$error}}</strong></p>
                    @endforeach

            @endif
            <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

            {{--<a href="#"><small>Forgot password?</small></a>--}}
            {{--<p class="text-muted text-center"><small>Do not have an account?</small></p>--}}

        </form>
        {{--<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>--}}
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{url('/')}}/js/jquery-2.1.1.js"></script>
<script src="{{url('/')}}/js/bootstrap.min.js"></script>

</body>

</html>
