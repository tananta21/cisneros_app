{{--modal CRONOGRAMA DE PAGO--}}
<div class="modal fade" id="cronograma_pago" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cronograma de Pago</h4>
            </div>
            <div class="modal-body col-lg-12">

                <div class="col-lg-12">
                    <form action="">
                        <div class="col-lg-3">
                            <span class="col-lg-6">TOTAL VENTA S/.</span>
                            <input id="total_cronograma" readonly type="text" class="col-lg-6" style="font-weight: bold"/>
                        </div>
                        <div class="col-lg-3">
                            <span class="col-lg-4">PAGO</span>
                            <select name="fecha_pago" id="fecha_pago" style="font-weight: bold">
                                <option value="1">Diario</option>
                                <option value="2">Semanal</option>
                                <option value="3">Quincenal</option>
                                <option value="4">Mensual</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <span class="col-lg-5">N° CUOTAS</span>
                            <input required="true" id="cuotas" type="number" min="1" value="1" class="col-lg-5" style="font-weight: bold"/>
                        </div>

                        <div class="col-lg-3">
                            <span class="col-lg-5">TASA INTERES %</span>
                            <input id="interes" type="number" min="0" value="5" class="col-lg-5" style="font-weight: bold"/>
                        </div>
                    </form>
                    <div class="col-lg-12" style="text-align: center; margin-top: 2rem">
                        <div class="col-lg-12">
                            <button class="btn btn-primary" onclick="generarCuotas()">Generar Cuotas</button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12" style="padding-top: 2rem">
                    <div class="col-lg-7">{{--<button class="btn btn-default">limpiar</button>--}}</div>
                    <div class="col-lg-5" style="margin-bottom: 1.5rem">
                        <span style="font-size: 1.5rem; font-weight: bold">Total con Intereses S/. </span>
                        <span style="font-size: 1.5rem; font-weight:bold; border: none" id="total_intereses">0</span>
                    </div>

                    <table style="font-size: 1.2rem; margin-bottom: 0rem"  class="table table-hover display"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>N° CUOTA</th>
                            <th>FECHA PAGO</th>
                            <th>CUOTA</th>
                            <th>ESTADO</th>
                        </tr>
                        </thead>
                    </table>
                    <table id="cliente" style="font-size: 1.2rem"  class="table table-hover display"  cellspacing="0" width="100%">
                        <thead style="display: none;">
                        <tr>
                            <th>N° CUOTA</th>
                            <th>FECHA PAGO</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                        </tr>
                        </thead>
                        <tbody id="lista_cuotas">

                        </tbody>
                    </table>

                </div>
                <div class="col-lg-12" style="margin-top: 1.5rem; text-align: center">
                    {{--<div id="advertenciacrono" style="margin-bottom: 1rem; display: none">--}}
                        {{--<span>Se han realizado cambios</span>--}}
                        {{--<span style="font-weight: bold">!Actualice Por Favor¡</span>--}}
                    {{--</div>--}}
                    <div id="confirmarcrono">
                        {{--<button class="btn btn-primary" onclick="guardarCronograma()">Guardar Cronograma</button>--}}
                        <button class="btn btn-primary" data-dismiss="modal" onclick="aceptarCrono()" >Aceptar</button>
                        <button class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                <h3 style="text-align: center" class="modal-title">Actualizando Cronograma</h3>
            </div>
            <div class="modal-body">
                <div  style="text-align: center">
                    <i id="girar" class="fa fa-spinner fa-4x"></i>
                </div>
            </div>
        </div>

    </div>
</div>
