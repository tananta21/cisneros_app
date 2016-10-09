@extends('index')
@section('vistainicial')
@stop
@section('menu_modulos')
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/compra/compranueva">Nueva Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lista Compra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/compra/provedor">Proveedor</a>
            </li>

        </ul>
    </div>
@section('contenido_modulos')

    <div>
        <div class="col-lg-7" style="padding-top: 1rem; margin-bottom: 1.5rem; margin-top: 1.5rem;">
            <div class="col-lg-2" style="text-align: center">
                <a id="venta" onclick="vender()" href="#" style="color: #000000">
                    <i class="fa fa-file fa-2x" aria-hidden="true"></i><br/>
                    <span style="font-size: 1.2rem">Generar Compra</span>
                </a>
            </div>
            <div class="col-lg-2" style="text-align: center;">
                <a href="#" style="color: #000000;">
                    <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i><br/>
                    <span style="font-size: 1.2rem">Ayuda</span>
                </a>
            </div>

            {{--buscar producto en venta--}}
            <div class="col-lg-12">
                <div class="col-lg-12" >
                    <div class="col-lg-12" style="margin-bottom: 1.5rem; margin-top: 3rem" >
                        <a data-toggle="modal" data-target="#producto_venta" href="#" style="font-size: 1.5rem" >
                            Añadir Producto
                            <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                        </a>
                    </div>

                    {{--detalle venta--}}
                    <div class="col-lg-12">
                        <table class="table table-hover" id="myTable" onchange="colSum()" style="font-size: 1.3rem;">
                            <thead>
                            <tr>
                                <th>CANT</th>
                                <th>NOMBRE</th>
                                <th>P. UNIT.</th>
                                <th>TOTAL</th>
                                <th>ACCION</th>
                            </tr>
                            </thead>
                            <tbody id="cuerpo">
                            </tbody>
                        </table>
                        <div id="total_productos"></div>
                    </div>
                    {{--<div class="col-lg-12" style="display: flex; justify-content: center; margin-top: 3rem">--}}
                    {{--<button id="limpiar" class="btn btn-primary btn-sm">Limpiar Detalle</button>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>

        {{--TOTAL Y CLIENTE--}}
        <div class="col-lg-5" style="margin-top: 1.5rem;" >
            <div class="col-lg-12" style="color: greenyellow;background: #000000; font-size: 4rem; text-align: center">
                <span >S/. </span><span type="text" class="totalventa">0</span>
            </div>
            <div class="col-lg-12" style="padding-top: 1rem">
                <span>Tipo Documento</span>
                <select name="tipo_documento" id=""  onChange="cambiarFactura(this.value);">
                    <option value="boleta">Boleta</option>
                    <option value="factura">Factura</option>
                </select>
            </div>
            {{--boleta--}}
            <div id="boleta" >
                <div class="col-lg-12" style=" margin-top: 1rem; border: 1px solid grey;border-radius: 5px; background: #d3d3d3">
                    <div class="col-lg-12" style="padding: 1rem" >
                        <div class="col-lg-4" style="text-align: center">
                            <span>Serie</span>
                            <input readonly type="text" class="col-lg-12" value="001" style="text-align: center"/>
                        </div>
                        <div class="col-lg-8" style="text-align: center">
                            <span>N° de compra</span>
                            <input readonly type="text" class="col-lg-12" value="C00000017" style="text-align: center"/>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style=" margin-top: 1rem; padding: 2rem; border: 1px solid grey;border-radius: 5px">
                    <span>Datos del Proveedor(Opcional)</span>
                    <input type="text" class="col-lg-9" value="Publico en General"/>
                    <a class="col-lg-1" href=""><i class="fa fa-search fa-1x"></i></a>
                    <a class="col-lg-2" data-toggle="modal" data-target="#cliente_venta" href="#"><i class="fa fa-file-archive-o fa-1x"></i></a>
                </div>
            </div>

            {{--FACTURA--}}
            <div id="factura"  style="display: none">
                <div class="col-lg-12" style=" margin-top: 1rem; border: 1px solid grey;border-radius: 5px; background: #d3d3d3">
                    <div class="col-lg-12" style="padding: 1rem" >
                        <div class="col-lg-4" style="text-align: center">
                            <span>Serie</span>
                            <input readonly type="text" class="col-lg-12" value="001" style="text-align: center"/>
                        </div>
                        <div class="col-lg-8" style="text-align: center">
                            <span>N° de compra</span>
                            <input readonly type="text" class="col-lg-12" value="C00000017" style="text-align: center"/>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style=" margin-top: 1rem; padding: 2rem; border: 1px solid grey;border-radius: 5px">
                    <span>factura</span><br/>
                    <input type="text" class="col-lg-9" placeholder="R.U.C"/><br/>
                    <span>Datos del proveedor(Opcional)</span><br/>
                    <input type="text" class="col-lg-9" value="Publico en General"/>
                    <a class="col-lg-1" href=""><i class="fa fa-search fa-1x"></i></a>
                    <a class="col-lg-2" data-toggle="modal" data-target="#cliente_venta" href="#"><i class="fa fa-file-archive-o fa-1x"></i></a>
                </div>
            </div>

            {{--RESUMEN VENTA--}}
            <div class="col-lg-12" style=" margin-top: 1rem; border: 1px solid grey; padding: 1rem; border-radius: 5px">
                <div class="col-lg-12">
                    <span class="col-lg-10">Cantidad de Productos</span><span class="cantidadproductos">0</span>
                    <span class="col-lg-10">Valor compra</span><span class="col-lg-2">S./850.00</span>
                    <span class="col-lg-10">Igv</span><span class="col-lg-2">S/.150</span>
                </div>
                <div class="col-lg-12" style="background: #1fd3af; padding: 1.5rem; font-weight: bold">
                    <span class="col-lg-9">Total a pagar:</span>
                    <span>S/. </span><span class=" totalventa">0</span>
                </div>
            </div>

        </div>


    </div>

    {{--<script src="{{url('/')}}/js/jquery-2.1.1.js"></script>--}}
    <script>
        (function() {
            $("#formulario_busqueda").submit(function() {
                var form = $('#formulario_busqueda');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        codigo: $(this).find( 'input[name="codigo"]' ).val(),
                        tipo: $(this).find( 'select[name="tipoproducto"]' ).val()
//                        legajo: $("#legajo").val(),
//                            "_token": $(this).find( 'input[name="_token"]' ).val()
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },

                    success: function(respuesta) {
                        if (respuesta.length > 0) {

                            var html = '';
                            for(var i in respuesta){
//                            $.each(respuesta, function(i,item) {
                                html += ' <tr>';
                                html += ' <td><button id="add" onclick="agregar('+respuesta[i].id +')">AGREGAR</button></td>';
                                html += ' <td><input type="text" id="codigo'+respuesta[i].id+'" style="border:none" readonly value="'+respuesta[i].serie +'"/></td>';
                                html += ' <td><input type="text" id="nombreProducto'+respuesta[i].id+'" style="border:none" readonly value="'+respuesta[i].nombre +'"/></td>';
                                html += ' <td><input type="text" id="precio'+respuesta[i].id+'" style="border:none; color: red; padding: 0.2rem; background: #ffff00" readonly value="'+respuesta[i].precio +'"/></td>';//
                                html += ' <td><input type="text" id="stock'+respuesta[i].id+'" style="border:none; color: red; padding: 0.2rem; background: #ffff00" readonly value="'+respuesta[i].stock_actual +'"/></td>';
                                html += ' </tr>';
//
                            }
                            html += '';
                            $("#respuesta").html(html);

                        } else {
                            $("#respuesta").html('<div style="color: red;"> No hay ningún producto con ese codigo. </div>');
                        }

                    }
                });
            });
        }).call(this);

    </script>

    {{--sumar pedido para el subtotal--}}
    <script>
        function fncSumar(id){

//                $(document).on('keyup mouseup', '#cantidad'+id, function() {
//                    alert($('#cantidad'+id).val());
//
//                });
//                $(document).on('keyup mouseup', '#precios'+id, function() {
//                    alert($('#precios'+id).val());
//
//                });

            var numero1 = document.getElementById('cantidad'+id).value;
            document.getElementById('cantidad'+id).setAttribute('value', numero1);
            var numero2 = document.getElementById('precios'+id).value;
            $('#precios'+id).val(numero2);
            document.getElementById('total'+id).setAttribute('value', numero1*numero2);

        }


        function colSum(){
            var sum=0;
            var cant = 0;
            //iterate through each input and add to sum
            $('.subtotal').each(function() {
                sum += parseInt($(this).val());
            });

            $('.cantidades').each(function() {
                cant += parseInt($(this).val());
            });

//                $('#totalventa').val('S/.'+sum);
            $('.totalventa').html(sum);
            $('.cantidadproductos').html(cant);

        }
    </script>

    {{--agregar fila tabla detalle venta--}}
    <script type="text/javascript">
        function agregar(id) {

            $('#total_productos').css('display','none');
            var tbody = $('#myTable').children('tbody');
            var table = tbody.length ? tbody : $('#myTable');
            table.append(
                    '<tr id="filaPedido'+id+'">' +
                    '</td><input class="productosid" type="hidden" name="idproducto[]" value="'+id+'"/></td>' +
                    '<td><input step="any" type="number" class="cantidades" min="0" value="0"  style="width: 5rem"   onchange="fncSumar('+id+')"  name="cantidad[]" id="cantidad'+id+'"/>'+
                    '<td>'+$("#nombreProducto"+id).val()+'</td>' +
                    '<td><input step="any" type="number" min="0" style="width: 6rem" onchange="fncSumar('+id+')"  id="precios'+id+'"  name="precio[]" value="'+$("#precio"+id).val()+'"/></td>' +
                    //            '<td>'+$("#precio").val()+'</td>' +
                    '<td><input readonly style="width: 8rem" class="subtotal" type="number" value="0"  id="total'+id+'" /></td>' +
                    '<td style="text-align: center"><a style="color: #ff0000" onclick="eliminarPedido('+id+')"><i class="fa fa-remove fa-2x"></i></a></td>' +
                    '</tr>');
        };

        //        eliminar pedido
        function eliminarPedido(id){

            $('.subtotal').each(function() {

                $("#filaPedido"+id).remove();
                var num_filas = ($('#cuerpo tr:last').index() + 1);
                var sum = 0;
                var cant = 0;
                if(num_filas == 0){
                    $('#total_productos').css('display','block');
                    $('.totalventa').html(sum);
                    $('.cantidadproductos').html(cant);

                }

                else{
                    $("#filaPedido"+id).remove();
                    sum += parseInt($(this).val());
                    $('.totalventa').html(sum);
                    $('.cantidades').each(function() {
                        cant += parseInt($(this).val());
                    });
                    $('.cantidadproductos').html(cant);

                }

            });
        }

    </script>

    <script>
        var num_filas = ($('#cuerpo tr:last').index() + 1);
        $('#total_productos').html('<div style="color: red;"> No hay ningún registro</div>');
    </script>
    <script>
        function vender(){
            var num_filas = ($('#cuerpo tr:last').index() + 1);
            if(num_filas==0){
                alert('Registre al menos un producto');
            }
            else{
                $("#venta").attr('data-toggle','modal');
                $("#venta").attr('data-target','#generar_venta');

            }
        }
    </script>

    {{--limpiar contenido de tabla_respuesta--}}
    <script type="text/javascript">

        $(document).ready(function() {
            $("#limpiar").click(function(event) {
                $("#respuesta").empty();
                $("#codi").val("");
            });
        });
    </script>


@endsection
@endsection

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
                                <div class="btn btn-primary btn-md" id="limpiar"><i class="fa fa-refresh fa-1x"> Limpiar</i></div>
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

{{--modal GENERAR VENTA--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="generar_venta" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">GENERAR COMPRA</h4>
                </div>
                <div class="modal-body">
                    <div class="box box-primary">
                        <div style="text-align: center">
                            <h5 style="color: #0000ff; font-weight: bold">Total a pagar</h5>
                            <div style="color: greenyellow;background: #000000; font-size: 4rem; text-align: center">
                                <span >S/. </span><span type="text" class="totalventa">0</span>
                            </div>
                        </div>
                        <div style="text-align: center;margin-top: 3rem">
                            <h5 style="color: #0000ff; font-weight: bold">Tipo de Pago</h5>
                            <select name="tipo_pago" id="">
                                <option selected value="1">Efectivo</option>
                                <option value="2">Tarjeta</option>
                                <option value="3">Deposito</option>
                            </select>
                        </div>
                        <div style="text-align: center; margin-top: 3rem">
                            <h5 style="color: #0000ff; font-weight: bold">Monto Entregado</h5>
                            <span>S/. </span><input style="width: 25rem" type="number" step="any" name="monto_recibido" min="0"/>
                        </div>
                        <div style="text-align: center; margin-top: 2rem">
                            <a href="/venta/registro" style="text-align: center" class="btn btn-primary btn-md">Registrar Compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--modal BUSCAR CLIENTE EN VENTAS--}}
<div class="container">        <!-- Modal crear -->
    <div class="modal fade " id="cliente_venta" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BUSCAR CLIENTE</h4>
                </div>
                <div class="modal-body">
                    {{--formulario Buscar CLIENTE en ventas--}}
                    <div class="box box-primary">
                        <h3>buscar CLIENTE</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--CAMBIAR DE BOLETA A FACTURA--}}
<script type="text/javascript">
    function cambiarFactura(id) {
        if (id == "boleta") {
            $(document).ready(function(){
                $("#boleta").css("display", "block").addClass("animated fadeInRight");
                $("#factura").css("display", "none");
            });
        }
        if(id=="factura"){
            $("#boleta").css("display", "none");
            $("#factura").css("display", "block").addClass("animated fadeInRight");
        }
    }
</script>




