{{--modal BUSCAR PRODUCTOS EN VENTAS--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="producto_venta" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BUSCAR PRODUCTO</h4>
                </div>
                <div class="modal-body">
                    {{--formulario Buscar producto en ventas--}}
                    <div class="box box-primary">
                        <form action="/venta/buscarproducto" method="get" onsubmit="return false"  id="formulario_busqueda" style="margin-top: 1.5rem; margin-bottom: 1.3rem" >
                            <div class="col-lg-12">
                                <button type="submit" >Buscar  <i class="fa fa-search fa-1x"></i></button>
                                <input required="true" type="text" id="codi" name="codigo" placeholder="Ingrese Serie o Nombre" style="width: 25rem"/>
                                <div class="btn btn-primary btn-md" id="limpiarproducto"><i class="fa fa-refresh fa-1x"> Limpiar</i></div>
                                {{--<select name="tipoproducto">--}}
                                {{--<option value="1">Producto</option>--}}
                                {{--<option value="2">Servicio</option>--}}
                                {{--</select>--}}
                            </div>
                        </form>
                        <table class="table table-hover"  style="font-size: 1.3rem">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>P. Unit.</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody id="respuesta">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>