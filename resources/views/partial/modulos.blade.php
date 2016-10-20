@foreach(\App\Core\Modulo\Modulo::where('id_padre',null)->get() as $modulo)
    <li class="treeview">
        <a href="#">
            <i class="{{$modulo->icono}}"></i>
            <span>{{$modulo->descripcion}}</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu" style="display: none;">
            @if($modulo->id != 6)
                @foreach(\App\Core\Modulo\Modulo::where('id_padre','!=','')->get() as $submodulo)
                    @if($modulo->id == $submodulo->id_padre)
                        <li><a href="{{$submodulo->url}}"><i class="fa fa-circle-o"></i>{{$submodulo->descripcion}}</a></li>
                    @endif
                @endforeach
            @else
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                @endif
        </ul>
    </li>
@endforeach