@extends('index')
@section('vistainicial')
@stop

@section('menu_modulos')
        <div>
            <header style="background: skyblue">
                <ul style="display: flex; list-style: none">
                    <li>
                        <div style="padding:2rem;background: orange; margin: 1rem">
                            <a href="#" style="padding:2rem; color: white; font-weight: bold" >Productos</a>
                        </div>
                    </li>
                    <li>
                        <div style="padding:2rem;background: orange; margin: 1rem">
                            <a href="#" style="padding:2rem; color: white; font-weight: bold" >Almacen Tienda</a>
                        </div>
                    </li>
                    <li>
                        <div style="padding:2rem;background: orange; margin: 1rem">
                            <a href="#" style="padding:2rem; color: white; font-weight: bold" >Almacen Principal</a>
                        </div>
                    </li>

                </ul>
            </header>
        </div>


    @section('contenido_modulos')
        <h2>tananta</h2>
    @endsection
@endsection

