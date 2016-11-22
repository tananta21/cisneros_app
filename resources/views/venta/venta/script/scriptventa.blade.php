<div>
    {{--buscar productos desde modal--}}
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
                                html += ' <tr id="filaResultado'+respuesta[i].id+'">';
                                html += ' <td><button id="add" onclick="agregarFila('+respuesta[i].id +')">AGREGAR</button></td>';
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

    {{--limpiar contenido de tabla de busqueda de producto en ventas--}}
    <script type="text/javascript">

        $(document).ready(function() {
            $("#limpiarproducto").click(function(event) {
                $("#respuesta").empty();
                $("#codi").val("");
            });
        });
    </script>

    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function () {
            doc.fromHTML($('#contenido').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

        // This code is collected but useful, click below to jsfiddle link.
    </script>

    {{--agregar fila tabla detalle venta--}}
    <script type="text/javascript">
        function agregarFila(id) {

            var productos_id = $('input[name="idproducto[]"]').serializeArray();

            var tbody = $("#myTable tbody");
            if (tbody.children().length == 0) {
                $('#total_productos').css('display','none');
                var tbody = $('#myTable').children('tbody');
                var table = tbody.length ? tbody : $('#myTable');
                table.append(
                        '<tr id="filaPedido'+id+'">' +
                        '</td><input class="productosid" type="hidden" name="idproducto[]" value="'+id+'"/></td>' +
                        '<td><input step="any" type="number" class="cantidades" min="0" value="0"  style="width: 5rem"   onchange="fncSumar('+id+')"  name="cantidad[]" id="cantidad'+id+'"/>'+
                        '<td>'+$("#nombreProducto"+id).val()+'</td>' +
                        '<td><input readonly step="any" type="number" min="0" style="width: 6rem" onchange="fncSumar('+id+')"  id="precios'+id+'"  name="precio[]" value="'+$("#precio"+id).val()+'"/></td>' +
                            //            '<td>'+$("#precio").val()+'</td>' +
                        '<td><input readonly style="width: 8rem" class="subtotal" type="number" value="0"  id="total'+id+'" /></td>' +
                        '<td style="text-align: center"><a style="color: #ff0000" onclick="eliminarPedido('+id+')"><i class="fa fa-remove fa-2x"></i></a></td>' +
                        '</tr>'
                );
                var dialog = bootbox.dialog({
                    message: '<p class="text-center">Producto Agregado!</p>',
                    closeButton: false
                });
                setTimeout(function(){
                    dialog.modal('hide');
                }, 1000);
                $("#filaResultado"+id).remove();
            }
            else{
                for(i=0; i<productos_id.length; i++){
                    console.log(productos_id[i]["value"])
                    if(productos_id[i]["value"]==id){
                        var igual=0;
                    }
                }

                if(igual == 0){
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center">El Producto ya esta Registrado!</p>',
                        closeButton: false
                    });
                    setTimeout(function(){
                        dialog.modal('hide');
                    }, 1000);

                    $("#filaResultado"+id).remove();
                    return false;
                }
                else{
                    $('#total_productos').css('display','none');
                    var tbody = $('#myTable').children('tbody');
                    var table = tbody.length ? tbody : $('#myTable');
                    table.append(
                            '<tr id="filaPedido'+id+'">' +
                            '</td><input class="productosid" type="hidden" name="idproducto[]" value="'+id+'"/></td>' +
                            '<td><input step="any" type="number" class="cantidades" min="0" value="0"  style="width: 5rem"   onchange="fncSumar('+id+')"  name="cantidad[]" id="cantidad'+id+'"/>'+
                            '<td>'+$("#nombreProducto"+id).val()+'</td>' +
                            '<td><input readonly step="any" type="number" min="0" style="width: 6rem" onchange="fncSumar('+id+')"  id="precios'+id+'"  name="precio[]" value="'+$("#precio"+id).val()+'"/></td>' +
                                //            '<td>'+$("#precio").val()+'</td>' +
                            '<td><input readonly style="width: 8rem" class="subtotal" type="number" value="0"  id="total'+id+'" /></td>' +
                            '<td style="text-align: center"><a style="color: #ff0000" onclick="eliminarPedido('+id+')"><i class="fa fa-remove fa-2x"></i></a></td>' +
                            '</tr>'
                    );
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center">Producto Agregado!</p>',
                        closeButton: false
                    });
                    setTimeout(function(){
                        dialog.modal('hide');
                    }, 1000);
                    $("#filaResultado"+id).remove();
                }




            }

        }
    </script>

    {{--quitar producto de la tabla detalle venta--}}
    <script>
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

    {{--sumar pedido para el subtotal y total de la venta--}}
    <script>
        function fncSumar(id){

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


    {{--CAMBIAR TIPO DE VENTA--}}
    <script type="text/javascript">
        function cambiarVenta(id) {
            if (id == 1) {
                $(document).ready(function(){
                    $("#venta_contado").css("display", "block").addClass("animated fadeInRight");
                    $("#cajatotalcontado").css("display", "block").addClass("animated fadeInRight");
                    $("#venta_credito").css("display", "none");
                    $("#caja_cronograma").css("display", "none");
                    $("#cajatotalcredito").css("display", "none");
                });
            }
            if(id==2){
                $("#venta_contado").addClass("animated fadeInRight");
                $("#venta_credito").css("display", "block").addClass("animated fadeInRight");
                $("#caja_cronograma").css("display", "block").addClass("animated fadeInRight");
                $("#cajatotalcredito").css("display", "block").addClass("animated fadeInRight");
//                $("#cajatotalcontado").css("display", "none");
                $("#venta_contado").removeClass("animated fadeInRight");
            }
        }
    </script>

    {{--realizar venta--}}
    <script type="text/javascript">

        $(document).ready(function() {
            $("#venta_realizada").click(function() {
                if($("#tipo_venta").val()==2){
                    var tbody = $("#cliente tbody tr td");
//                    console.log(tbody.children().length)
                    if (tbody.children().length == 0) {
                        bootbox.alert("Debe Generar Cronograma de pagos");
                    }
                    else {
                        var codigo_producto = $('input[name="idproducto[]"]').serializeArray();
                        var cantidad_producto = $('input[name="cantidad[]"]').serializeArray();
                        var precio_producto = $('input[name="precio[]"]').serializeArray();
                        var nro_venta = $('input[name="nro_venta"]').val();
                        var tipo_venta = $("#tipo_venta").val();
                        var empleado_id = $('input[name="id_empleado"]').val();
                        var fecha_venta = $("#fecha_venta").val();
                        var clienteid = $("#clienteid").val();
                        var totalcontado = $(".totalventa").text();
                        var url = '{{route("registrar.venta")}}';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                idproducto: codigo_producto,
                                cantidad: cantidad_producto,
                                precio: precio_producto,
                                nro_venta: nro_venta,
                                tipo_venta: tipo_venta,
                                empleado_id: empleado_id,
                                fecha_venta: fecha_venta,
                                cliente_id: clienteid
                            },
                            dataType: 'JSON',
                            beforeSend: function() {
                                $('#myModal').modal('show');
                            },
                            error: function () {
                                $("#respuesta").html('<div> Ha surgido un error. </div>');
                            },
                            success: function () {
                                window.onload = guardarCronograma() ;

                            }
                        });
                    }
                }
                else {
                    var tbody = $("#myTable tbody");
                    if (tbody.children().length == 0) {
                        var tabla = 0;
                    }
                    if (tabla == 0) {
                        bootbox.alert("Registre al menos un producto!");
                        return false;
                    }
                    else {
                        var codigo_producto = $('input[name="idproducto[]"]').serializeArray();
                        var cantidad_producto = $('input[name="cantidad[]"]').serializeArray();
                        var precio_producto = $('input[name="precio[]"]').serializeArray();
                        var nro_venta = $('input[name="nro_venta"]').val();
                        var tipo_venta = $("#tipo_venta").val();
                        var empleado_id = $('input[name="id_empleado"]').val();
                        var fecha_venta = $("#fecha_venta").val();
                        var clienteid = $("#clienteid").val();
                        var totalcontado = $(".totalventa").text()
                        var url = '{{route("registrar.venta")}}';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                idproducto: codigo_producto,
                                cantidad: cantidad_producto,
                                precio: precio_producto,
                                nro_venta: nro_venta,
                                tipo_venta: tipo_venta,
                                empleado_id: empleado_id,
                                fecha_venta: fecha_venta,
                                cliente_id: clienteid
                            },
                            dataType: 'JSON',
                            error: function () {
                                alert("error");
                            },
                            success: function () {
                                bootbox.alert("¡VENTA REGISTRADO CORRECTAMENTE ¡");
                                location.reload();
                            }
                        });
                    }
                }
            });

        });
    </script>



</div>