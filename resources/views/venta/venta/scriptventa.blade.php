<div>

    {{--sumar pedido para el subtotal--}}
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

    {{--buscar Clientes: evaluacion crediticia--}}
    <script type="text/javascript">
        (function() {
            $("#buscar_cliente").submit(function() {
                var form = $('#buscar_cliente');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        cliente: $(this).find('input[name="dato_cliente"]').val()
                    },

                    dataType: 'JSON',

                    beforeSend: function() {
                        $("#lista_clientes").html('Buscando Cliente...');
                    },
                    error: function() {
                        $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            for(var i in respuesta){
                                html += ' <tr>';
                                html += ' <td><input type="text" style="border:none" readonly value="'+respuesta[i].nro_documento +'"/></td>';
                                html += ' <td><input type="text" style="border:none" readonly value="'+respuesta[i].nombres +'"/></td>';
                                html += ' <td><input type="text"  style="border:none;" readonly value="'+respuesta[i].apellidos +'"/></td>';
                                html += ' <td><button type="button" class="btn btn-default btn-md" onclick="detalle('+respuesta[i].id +')">Ver detalles</button></td>';
                                html += ' </tr>';

                            }
                            html += '';
                            $("#lista_clientes").html(html);

                        } else {
                            $("#lista_clientes").html('<div> No existen registros con ese dato</div>');
                        }
                    }
                });

            });
        }).call(this);


        $(document).ready(function() {
            $("#limpiar").click(function(event) {
                $("#lista_clientes").empty();
                $("#dato").val("");
            });
        });

    </script>

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

    {{--mostrar detalles del cliente--}}
    <script>
        function detalle(id){
            console.log(id);
            var id_cliente = id;
            var url = '/venta/cliente/realizadas';
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    cliente: id_cliente
                },
                dataType: 'JSON',
                error: function() {
                    $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {
                    console.log(respuesta);
//                        console.log(respuesta[2][0].nombres)
                    $("#nombre").html(respuesta[1][0].nombres);
                    $("#total").html(respuesta[0]);
                    $('#detalle_cliente').modal('show');
                }
            });

        }

    </script>

    {{--agregar fila tabla detalle venta--}}
    <script type="text/javascript">
        function agregar(id) {

//                $('#myTable tbody tr').each(function () {
//                    var id_fila = $(this).attr('id');
//                    if(id_fila.substr(10) == id){
//                        $('#myModal').modal('show');
//                    }
//                    else{
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
//                    }
//                });

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

    {{--limpiar contenido de tabla_respuesta--}}
    <script type="text/javascript">

        $(document).ready(function() {
            $("#limpiarproducto").click(function(event) {
                $("#respuesta").empty();
                $("#codi").val("");
            });
        });
    </script>

    {{--script buscar cliente en ventas al contado--}}
    <script>
        (function() {
            $("#buscar_cliente_contado").submit(function() {
                var form = $('#buscar_cliente_contado');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        cliente: $(this).find('input[name="dato_cliente"]').val()
                    },

                    dataType: 'JSON',

                    beforeSend: function() {
                        $("#lista_contado").html('Buscando Cliente...');
                    },
                    error: function() {
                        $("#lista_contado").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        console.log("respuesta")
                        if (respuesta) {
                            var html = '';
                            for(var i in respuesta){
                                html += ' <tr>';
                                html += ' <td><button style="font-size: 1.2rem" id="add" class="btn btn-primary btn-md" onclick="seleccionar('+respuesta[i].id +')">Seleccionar</button></td>';
                                html += ' <td><input type="text" style="border:none" readonly value="'+respuesta[i].nro_documento +'"/></td>';
                                html += ' <td><input id="nombrescontado'+respuesta[i].id+'" type="text" style="border:none" readonly value="'+respuesta[i].nombres +'"/></td>';
                                html += ' <td><input id="apellidoscontado'+respuesta[i].id+'" type="text"  style="border:none;" readonly value="'+respuesta[i].apellidos +'"/></td>';
                                html += ' <td><button style="font-size: 1.2rem" id="add" class="btn btn-default btn-md" onclick="actualizar('+respuesta[i].id +')">Actualizar</button></td>';
                                html += ' </tr>';

                            }
                            html += '';
                            $("#lista_contado").html(html);


                        } else {
                            $("#lista_contado").html('<div>No existen registros con ese dato <br/>' +
                            ' <a data-toggle="modal" data-target="#registrar_cliente" href="#">¿Desea Agregar nuevo Cliente?</a></div>');
                        }
                        $('#cliente_contado').modal('show');
                    }
                });

            });
        }).call(this);
    </script>

    {{--seleccionar cliente venta al contado--}}
    <script>
        function seleccionar(id){
            $("#nombresyapellidos").val($("#nombrescontado"+id).val() +" "+$("#apellidoscontado"+id).val());
            $('#cliente_contado').modal('hide');

        }
    </script>





    {{--registrar nuevo cliente desde venta--}}
    <script>
        (function() {
            $("#registrarcliente").submit(function() {
                var form = $('#registrarcliente');
                var url = form.attr('action');
                var documento = $(this).find('input[name="nro_documento"]').val();
                var nombresyapellidos = $(this).find('input[name="nombres"]').val() +" "+ $(this).find('input[name="apellidos"]').val();
                        $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        tipo_cliente : $('select[name=tipo_cliente]').val(),
                        nro_documento: $(this).find('input[name="nro_documento"]').val(),
                        sexo: $(this).find('input:radio[name=sexo]:checked').val(),
                        nombres: $(this).find('input[name="nombres"]').val(),
                        apellidos: $(this).find('input[name="apellidos"]').val(),
                        telefono: $(this).find('input[name="telefono"]').val(),
                        correo: $(this).find('input[name="correo"]').val(),
                        direccion: $(this).find('input[name="direccion"]').val(),
                        numero_hijos: $(this).find('input[name="numero_hijos"]').val(),
                        _token: $(this).find('input[name="_token"]').val(),
                        distrito : $('select[name=distrito]').val(),
                        estado_civil : $('select[name=estado_civil]').val(),
                        grado_instruccion : $('select[name=grado_instruccion]').val(),
                        ocupacion : $('select[name=ocupacion]').val(),
                        fecha_nacimiento: $(this).find('input[name="fecha_nacimiento"]').val(),
                        script : "si"
                    },

                    dataType: 'JSON',

                    beforeSend: function() {
                        $("#lista_contado").html('Buscando Cliente...');
                    },
                    error: function() {
                        $("#lista_contado").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        alert("¡ CLIENTE REGISTRADO CORRECTAMENTE !");
                        $('#registrar_cliente').modal('hide');
                        $("#documento").val(documento);
                        $("#nombresyapellidos").val(nombresyapellidos);
                        document.getElementById("registrarcliente").reset();
                    }
                });

            });
        }).call(this);

    </script>



    {{--actualizar datos cliente--}}
    <script>
        function actualizar(id){
            var url = "/venta/cliente/editar/"+id;
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        cliente: id,
                        script : "si"
                    },

                    dataType: 'JSON',
                    error: function() {
                        $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        $("#edit_nro_documento").val(respuesta.nro_documento)
//                        console.log(respuesta[2][0].nombres)
//                        $("#nombre").html(respuesta[1][0].nombres);
//                        $("#total").html(respuesta[0]);
                    }
                });
            $('#actualizar_cliente').modal('show');
            }


    </script>

    {{--abrir modal CRONOGRAMA DE PAGO--}}
    <script>
        function cronograma(){
            $('#cronograma_pago').modal('show');
            $('#total_cronograma').val($(".totalventa").text());
//            alert($(".totalventa").text());

        }
    </script>

    {{--FUNCION SUMAR DIAS--}}
    <script>
        function sumarDias(fecha, dias){
            fecha.setDate(fecha.getDate() + dias);
            var hoy = fecha;

            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1; //hoy es 0!
            var yyyy = hoy.getFullYear();

            if(dd<10) {
                dd='0'+dd
            }

            if(mm<10) {
                mm='0'+mm
            }

            var fecha_pago = dd+'/'+mm+'/'+yyyy;
            return fecha_pago;
        }
    </script>

    {{--CAMBIAR TIPO DE VENTA--}}
    <script type="text/javascript">
        function cambiarVenta(id) {
            if (id == 1) {
                $(document).ready(function(){
                    $("#venta_contado").css("display", "block").addClass("animated fadeInRight");
                    $("#venta_credito").css("display", "none");
                });
            }
            if(id==2){
                $("#venta_contado").addClass("animated fadeInRight");
                $("#venta_credito").css("display", "block").addClass("animated fadeInRight");
                $("#caja_cronograma").css("display", "block").addClass("animated fadeInRight");
                $("#venta_contado").removeClass("animated fadeInRight");
            }
        }
    </script>



    {{-- BOTON GENERAR CUOTAS--}}
    <script>
        function generarCuotas(){

            $("#lista_cuotas").empty();

            var d = new Date();
            var total = parseFloat($("#total_cronograma").val());
            var interes = parseFloat(total*(($("#interes").val())/100));
            var cuotas = parseFloat($("#cuotas").val());
            var monto_total = total + interes;

//            DIARIO

            if($("#fecha_pago").val() == 1){
                var numdia = 1;
                var monto_cuota = monto_total/cuotas;
                console.log(monto_cuota);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input id="apellidoscontado" type="text"  style="border:none;" readonly value="'+ monto_cuota+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="Pendiente"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

//            SEMANAL
            if($("#fecha_pago").val() == 2){
                var numdia = 7;
                var monto_cuota = monto_total/cuotas;
                console.log(monto_cuota);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input id="apellidoscontado" type="text"  style="border:none;" readonly value="'+ monto_cuota+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="Pendiente"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

//            QUINCENAL

            if($("#fecha_pago").val() == 3){
                var numdia = 15;
                var monto_cuota = (monto_total/cuotas).toFixed(2);
                console.log(monto_cuota);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input id="apellidoscontado" type="text"  style="border:none;" readonly value="'+ monto_cuota+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="Pendiente"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

//            MENSUAL

            if($("#fecha_pago").val() == 4){
                var numdia = 30;
                var monto_cuota = monto_total/cuotas;
                console.log(monto_cuota);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input id="apellidoscontado" type="text"  style="border:none;" readonly value="'+ monto_cuota+'"/></td>';
                    html += ' <td><input id="nombrescontado" type="text" style="border:none" readonly value="Pendiente"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

        }
    </script>




</div>
