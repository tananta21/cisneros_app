{{--buscar cliente en venta al contado--}}
<div class="modal fade" id="cliente_contado" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Busqueda de cliente</h4>
            </div>
            <div class="modal-body">
                <div>
                    <table style="font-size: 1.2rem"  class="table table-hover display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>DOCUMENTO</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody id="lista_contado">

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