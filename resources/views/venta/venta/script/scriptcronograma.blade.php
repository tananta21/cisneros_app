<div>

    {{--abrir modal CRONOGRAMA DE PAGO--}}
    <script>
        function cronograma(){
            var tbody = $("#myTable tbody");
            if (tbody.children().length == 0) {
                var tabla = 0;
            }
            if(tabla == 0){
                bootbox.alert({
                    message: "Registre al menos un producto!",
                    size: 'small'
                });
                return false;
            }
            else{
                $('#cronograma_pago').modal('show');
                $('#total_cronograma').val($(".totalventa").text());
            }


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

            var fecha_pago = dd+'-'+mm+'-'+yyyy;
            return fecha_pago;
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
            $("#total_intereses").html(monto_total);

//            DIARIO

            if($("#fecha_pago").val() == 1){
                var numdia = 1;
                var monto_cuota = (monto_total/cuotas).toFixed(2);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input name="fechapago[]" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input name="montopago[]" type="text"  style="border:none; text-align: center" readonly value="'+monto_cuota+'"/></td>';
                    html += ' <td><input name="estadopago[]" type="text" style="border:none; text-align: center" readonly value="0"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

//            SEMANAL
            if($("#fecha_pago").val() == 2){
                var numdia = 7;
                var monto_cuota = (monto_total/cuotas).toFixed(2);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input name="fechapago[]" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input name="montopago[]" type="text"  style="border:none; text-align: center" readonly value="'+monto_cuota+'"/></td>';
                    html += ' <td><input name="estadopago[]" type="text" style="border:none; text-align: center" readonly value="0"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }

//            QUINCENAL

            if($("#fecha_pago").val() == 3){
                var numdia = 15;
                var monto_cuota = (monto_total/cuotas).toFixed(2);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input name="fechapago[]" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input name="montopago[]" type="text"  style="border:none; text-align: center" readonly value="'+monto_cuota+'"/></td>';
                    html += ' <td><input name="estadopago[]" type="text" style="border:none; text-align: center" readonly value="0"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);

            }

//            MENSUAL

            if($("#fecha_pago").val() == 4){
                var numdia = 30;
                var monto_cuota = (monto_total/cuotas).toFixed(2);
                var html = '';
                for (i = 1; i<=$("#cuotas").val() ; i++) {
//                    console.log(sumarDias(d, numdia));

                    html += ' <tr>';
                    html += ' <td><input type="text" style="border:none" readonly value="'+i+'"/></td>';
                    html += ' <td><input name="fechapago[]" type="text" style="border:none" readonly value="'+ sumarDias(d, numdia) +'"/></td>';
                    html += ' <td><input name="montopago[]" type="text"  style="border:none; text-align: center" readonly value="'+monto_cuota+'"/></td>';
                    html += ' <td><input name="estadopago[]" type="text" style="border:none; text-align: center" readonly value="0"/></td>';
                    html += ' </tr>';
                }

                html += '';
                $("#lista_cuotas").html(html);
            }
            $("#advertenciacrono").css("display","block");
        }
    </script>
    {{--boton aceptar cronograma--}}
    <script>
        function aceptarCrono(){
            $(".totalventacredito").html($("#total_intereses").text());
        }
    </script>
    {{--BOTON GUARDAR CRONOGRAMA--}}
    <script>
        function guardarCronograma() {
            var fechapago = $('input[name="fechapago[]"]').serializeArray();
            var montopago = $('input[name="montopago[]"]').serializeArray();
            var estadopago = $('input[name="estadopago[]"]').serializeArray();
            var nro_orden = $('input[name="nro_venta"]').val();
            var fecha_venta = $("#fecha_venta").val();
            var url = "/venta/cronograma/registrar";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    fecha_pago: fechapago,
                    monto_pago: montopago,
                    estado_pago: estadopago,
                    nro_venta: nro_orden,
                    fecha_venta: fecha_venta
                },
                beforeSend: function() {
                    $('#myModal').modal('show');
                },
                dataType: 'JSON',
                success: function() {
//                    bootbox.alert("¡VENTA REGISTRADO CORRECTAMENTE ¡");
                    location.reload();
                }
            });


        }
    </script>

</div>
