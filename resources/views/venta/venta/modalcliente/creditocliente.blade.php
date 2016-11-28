{{--modal evaluar cliente--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="evaluar_cliente" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CONSULTAR CLIENTE</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" id="buscar_cliente" action="/venta/consultar/cliente" accept-charset="UTF-8"  class="form-horizontal" role="form" onsubmit="return false;">
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-primary">BUSCAR</button>
                        </div>
                        <div class="col-lg-6">
                            <input id="dato" required="true" type="text"  maxlength="30" class="form-control" placeholder="Nro Documento o Nombres del Cliente" name="dato_cliente" value="" >
                        </div>
                        <div class="col-lg-1">
                            <div class="btn btn-default btn-md" id="limpiar"><i class="fa fa-refresh fa-1x"> Limpiar</i>
                            </div>
                        </div>
                    </form>
                    <div style="padding-top: 2rem">
                        <table style="font-size: 1.2rem"   class="table table-hover display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>DOCUMENTO</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>ACCION</th>
                            </tr>
                            </thead>
                            <tbody id="lista_clientes">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


{{--modal detalles del cliente--}}
<div class="modal fade" id="detalle_cliente" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{--<div class="modal-header">--}}
            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
            {{--<h4 class="modal-title">Detalles del Cliente</h4>--}}
            {{--</div>--}}
            <div class="modal-body col-lg-12">
                <div class="col-lg-12">
                    <h4 class="col-lg-10" style="margin-top: 0rem; font-weight: bold">Datos Generales Del Cliente</h4>
                    <button onclick="actualizarDatos();" class="btn btn-default col-lg-2">Actualizar Datos</button>
                    <input id="actualizardatos" type="hidden" value="" />
                    <div style="margin-top: 1.3rem">
                        <div class="col-lg-12">
                            <span class="col-lg-2">N° DOCUMENTO</span>
                            <input readonly id="detalle_documento" class="col-lg-4" type="text"/>
                        </div>
                        <div class="col-lg-12" style="margin-top: 1.2rem; margin-bottom: 1.2rem">
                            <span class="col-lg-2">NOMBRES Y APELLIDOS</span>
                            <input readonly id="detalle_nombres" class="col-lg-8" type="text"/>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <h4 class="col-lg-10" style="margin-top: 0.5rem;font-weight: bold">Actividad del Cliente</h4>

                    <div class="col-lg-12">
                        <h5 class="col-lg-2">Total de ventas realizadas</h5>
                        <input readonly class="col-lg-1" type="text" id="total_compras"/>
                    </div>


            </div>
                <div class="col-lg-12">
                    <h4 class="col-lg-10" style="margin-top: 0.5rem; font-weight: bold">Historial del Cliente</h4>
                    <div class="col-lg-12">
                        <form action="" id="criteriosgraficos" onsubmit="return false;">
                        <span class="col-lg-2" >Seleccione Criterio</span>
                        <select id="tipo_grafico" id="" class="col-lg-3">
                            <option selected value="1">Ventas al Año</option>
                            <option value="2">Promedio de Ventas</option>
                            {{--<option value="3">Historial Crediticio</option>--}}
                        </select>
                        <span class="col-lg-1">Año</span>
                        <select id="año_grafico" id="" class="col-lg-2">
                            <option selected value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                        </select>
                            <button onclick="grafCliente();" style="margin-left: 2rem" class="btn btn-info btn-sm col-lg-2">Ver Grafico</button>
                        </form>
                    </div>

                </div>

                <div class="col-lg-12" style="text-align: center">
                    <div id="nroVentas" style="min-width: 800px; height: 300px; margin: 0 auto"></div>
                </div>
                <div class="col-lg-12" style="text-align: center">
                    <button onclick="aprobarCliente()" class="btn btn-adn">Aprobar Cliente</button>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" onclick="cerrar()" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
