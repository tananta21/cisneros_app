
<?php

 $tipo = Auth::user()->tipo_empleado_id

?>



@foreach(\App\Core\Acceso\Acceso
            ::join('modulos', 'accesos.modulo_id', '=', 'modulos.id')
            ->select('modulos.descripcion','modulos.icono as icono','modulos.id as id')
            ->whereRaw("tipo_empleado_id = '" . $tipo . "' and accesos.estado = 1 and modulos.nivel = 1")
            ->orderBy("modulos.id","asc")
            ->get()
 as $modulo)
    <li class="treeview">
        <a href="#">
            <i class="{{$modulo->icono}}"></i>
            <span>{{$modulo->descripcion}}</span>
            <i class="fa fa-angle-left pull-right"></i>
            <ul class="treeview-menu" style="display: none;">
                @foreach(
                 \App\Core\Acceso\Acceso
                    ::join('modulos', 'accesos.modulo_id', '=', 'modulos.id')
                    ->select('modulos.descripcion','modulos.id_padre as id_padre', 'modulos.url as url')
                    ->whereRaw("tipo_empleado_id = '" . $tipo . "' and accesos.estado = 1 AND modulos.id_padre != '' ")
                    ->orderBy("modulos.id","asc")
                    ->get()
                 as $submodulo)
                    @if($modulo->id == $submodulo->id_padre)
                        <li><a href="{{$submodulo->url}}"><i class="fa fa-circle-o"></i>{{$submodulo->descripcion}}</a></li>
                    @endif
                @endforeach
            </ul>
        </a>
    </li>
@endforeach

{{--@foreach(\App\Core\Modulo\Modulo::where('id_padre',null)->get() as $modulo)--}}
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="{{$modulo->icono}}"></i>--}}
            {{--<span>{{$modulo->descripcion}}</span>--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu" style="display: none;">--}}
                {{--@foreach(\App\Core\Modulo\Modulo::where('id_padre','!=','')->get() as $submodulo)--}}
                    {{--@if($modulo->id == $submodulo->id_padre)--}}
                        {{--<li><a href="{{$submodulo->url}}"><i class="fa fa-circle-o"></i>{{$submodulo->descripcion}}</a></li>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
{{--@endforeach--}}




{{--<p style="color: #ff0000;">{{Auth::user()->tipo_empleado_id}}</p>--}}