@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/mantenimiento/principal">Menu Mantenimiento</a>
            </li>
        </ul>
    </div>

    <h3 class="col-lg-12" style="margin-bottom: 0.5rem">Editar Concepto Movimiento</h3>
    <hr class="col-lg-12 linea-titulo" size="5px" color="green"/>
    <div class="box box-primary">
        {!! Form::open(['action' => 'MantenimientoCompraVentaController@actualizarConceptoMovimiento','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="inputName" class="col-md-2 control-label">Concepto</label>
                <div class="col-md-6">
                    <input type="hidden" id="marcaid" name="marca_id" value="{{$registro->id}}"/>
                    <input id="descripmarca" required="true" maxlength="30" type="text" class="form-control"  placeholder="Nombre Tipo Pago" name="descripcion_marca" value="{{$registro->descripcion}}" >
                    <span style="font-size: 1rem; color: #0000ff">Maximo 30 caracteres</span>
                </div>
                <div class="col-md-4">
                    @if($registro->tipo_movimiento_id == 1)
                    <input id="activo"  type="radio"  name="estado" value="1" checked> <label style="cursor: pointer" for="activo"> Activo</label>
                    <input id="inactivo" type="radio" name="estado" value="0" style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                    @else
                        <input id="inactivo" type="radio" name="estado" value="0" checked style="margin-left: 2rem"> <label style="cursor: pointer" for="inactivo"> Inactivo </label>
                        <input id="activo"  type="radio"  name="estado" value="1" > <label style="cursor: pointer" for="activo"> Activo</label>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-md-2 control-label">Tipo Movimiento</label>
                <div class="col-md-6">
                    <select class="form-control" name="tipo_movimiento" id="">
                        <option value="">Selec. Tipo</option>
                        @foreach($tipomovimientos as $tipomovimiento)
                            @if($tipomovimiento->id == $id_tipomov)
                                <option selected value="{{$tipomovimiento->id}}">{{$tipomovimiento->descripcion}}</option>
                            @else
                                <option value="{{$tipomovimiento->id}}">{{$tipomovimiento->descripcion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="box-footer" style="text-align: center">
            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
            <a href="/mantenimiento/conceptomovimiento" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-info">Guardar</button>
        </div>

        <!-- /.box-body -->

        {!! Form::close() !!}
    </div>


@endsection
