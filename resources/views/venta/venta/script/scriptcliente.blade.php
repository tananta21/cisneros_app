<div>


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
                                html += ' <td><button type="button" class="btn btn-primary btn-md" onclick="detalle('+respuesta[i].id +')">Ver detalles</button></td>';
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


    {{--mostrar detalles del cliente en la evaluacion crediticia--}}
    <script>
        function detalle(id){
            var id_cliente = id;
            $("#actualizardatos").val(id_cliente);
            var url = '/venta/cliente/realizadas';
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    cliente: id,
                    tipo_graf: ($("#tipo_grafico").val()),
                    año_graf: ($("#año_grafico").val())
                },
                dataType: 'JSON',
                error: function() {
                    $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {
                    var meses = new Array();
                    var cantidad = new Array();
//                    console.log(respuesta[3][0].cantidad);
                    for(i=0;i<respuesta[3].length; i++){
                        meses.push((respuesta[3][i].mes).substring(0,3));
                        cantidad.push((respuesta[3][i].cantidad));
                    }
//                    console.log(meses);
                    window.onload = ventasMes(meses,cantidad) ;
//                        console.log(respuesta[2][0].nombres)
                    $("#detalle_documento").val(respuesta[1][0].nro_documento);
                    $("#detalle_nombres").val(respuesta[1][0].nombres +" "+ respuesta[1][0].apellidos);
                    $("#total_compras").val(respuesta[0]);
                    $('#detalle_cliente').modal('show');
                }
            });

        }

    </script>

    {{--boton actualizar datos desde detalles del cliente --}}
    <script>
        function actualizarDatos(){
            var id = $("#actualizardatos").val();
            window.onload = actualizar(id);
        }
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
                    error: function() {
                        $("#lista_contado").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            for(var i in respuesta){
                                html += ' <tr>';
                                html += ' <td><input type="hidden" style="border:none" id="cliente_idcontado" readonly value="'+respuesta[i].id +'"/></td>';
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
            $("#clienteid").val($("#cliente_idcontado").val());
        }
    </script>


    {{--cargar datos para registrar cliente--}}
    <script>
        function nuevoCliente(){
            var url = "/venta/cliente/nuevocliente";
            $("#estadocivil").empty();
            $("#ocupacion").empty();
            $("#gradoinstruccion").empty();
            $("#departamentos").empty();
            $(".edit_provincias").removeAttr("id");
            $(".edit_distritos").removeAttr("id");
            $(".re_provincias").attr("id","provincias");
            $(".re_distritos").attr("id","distritos");

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    script : "si"
                },
                dataType: 'JSON',
                error: function() {
                    $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {
//                   ESTADO CIVIL
                    for(i=0; i<respuesta[0].length ; i++){
                        if(respuesta[0][i].id == "1"){
                            $("#estadocivil").append('<option selected="selected" value="'+respuesta[0][i].id+'">Seleccione Estado Civil</option>');
                        }
                        else {
                            $("#estadocivil").append('<option value="' + respuesta[0][i].id + '">' + respuesta[0][i].descripcion + '</option>');
                        }
                    }

//                    OCUPACION
                    for(i=0; i<respuesta[1].length ; i++){
                        if(respuesta[1][i].id == "1"){
                            $("#ocupacion").append('<option selected="selected" value="'+respuesta[1][i].id+'">Seleccione Ocupacion</option>');
                        }
                        else {
                            $("#ocupacion").append('<option value="' + respuesta[1][i].id + '">' + respuesta[1][i].descripcion + '</option>');
                        }
                    }

//                    GRADO INSTRUCCION
                    for(i=0; i<respuesta[2].length ; i++){
                        if(respuesta[2][i].id == "1"){
                            $("#gradoinstruccion").append('<option selected="selected" value="'+respuesta[2][i].id+'">Seleccione Grado Instruccion</option>');
                        }
                        else {
                            $("#gradoinstruccion").append('<option value="' + respuesta[2][i].id + '">' + respuesta[2][i].descripcion + '</option>');
                        }
                    }

//                    DEPARTAMENTOS
                    $("#departamentos").append('<option selected="selected" value="0">Seleccione Departamento</option>');
                    for(i=0; i<respuesta[3].length ; i++){

                        $("#departamentos").append('<option value="' + respuesta[3][i].numubigeo + '">' + respuesta[3][i].departamento + '</option>');

                    }

                }
            });
            $('#registrar_cliente').modal('show');

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

    <script>
        function cerrar(){
            document.getElementById("criteriosgraficos").reset();
        }
    </script>

    {{--recuperar datos del cliente para editar--}}
    <script>
        function actualizar(id){
            var url = "/venta/cliente/editar/"+id;
            $(".estadocivil").empty();
            $(".ocupacion").empty();
            $(".gradoinstruccion").empty();
            $(".departamentos").empty();
            $(".edit_provincias").empty();
            $(".edit_distritos").empty();
            $(".re_provincias").removeAttr("id");
            $(".re_distritos").removeAttr("id");
            $(".edit_provincias").attr("id","provincias");
            $(".edit_distritos").attr("id","distritos");


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
                    console.log(respuesta);
//                        DATOS DEL CLIENTE
                    $("#id_cliente").val(respuesta[0].id);
                    $("#edit_nro_documento").val(respuesta[0].nro_documento);
                    $("#edit_nombres").val(respuesta[0].nombres);
                    $("#edit_apellidos").val(respuesta[0].apellidos);
                    $("#edit_telefono").val(respuesta[0].telefono);
                    $("#edit_correo").val(respuesta[0].correo);
                    $("#edit_direccion").val(respuesta[0].direccion);
                    $(".fecha-nacimiento").val(respuesta[0].fecha_nacimiento);
                    var estadocivil = respuesta[0].estado_civil_id;
                    var ocupacion =respuesta[0].ocupacion_id;
                    var gradoinstruccion =  respuesta[0].grado_instruccion_id;
                    var id_departamento = respuesta[7][0].id;
                    var id_provincia = respuesta[8][0].id;
                    var id_distrito = respuesta[9][0].id;

                    //                   ESTADO CIVIL
                    for(i=0; i<respuesta[1].length ; i++){
                        if(respuesta[1][i].id == estadocivil){
                            $(".estadocivil").append('<option selected="selected" value="'+respuesta[1][i].id+'">' + respuesta[1][i].descripcion + '</option>');
                        }
                        else {
                            $(".estadocivil").append('<option value="' + respuesta[1][i].id + '">' + respuesta[1][i].descripcion + '</option>');
                        }
                    }

                    //                   OCUPACION
                    for(i=0; i<respuesta[2].length ; i++){
                        if(respuesta[2][i].id == ocupacion){
                            $(".ocupacion").append('<option selected="selected" value="'+respuesta[2][i].id+'">' + respuesta[2][i].descripcion + '</option>');
                        }
                        else {
                            $(".ocupacion").append('<option value="' + respuesta[2][i].id + '">' + respuesta[2][i].descripcion + '</option>');
                        }
                    }
                    //                   GRADO INSTTRUCCION

                    for(i=0; i<respuesta[3].length ; i++){
                        if(respuesta[3][i].id == gradoinstruccion){
                            $(".gradoinstruccion").append('<option selected="selected" value="'+respuesta[3][i].id+'">' + respuesta[3][i].descripcion + '</option>');
                        }
                        else {
                            $(".gradoinstruccion").append('<option value="' + respuesta[3][i].id + '">' + respuesta[3][i].descripcion + '</option>');
                        }
                    }

//                        DEPARTAMENTOS
                    for(i=0; i<respuesta[4].length ; i++){

                        if(respuesta[4][i].id == id_departamento){
                            $(".departamentos").append('<option selected="selected" value="'+respuesta[4][i].numubigeo+'">' + respuesta[4][i].departamento + '</option>');
                        }
                        else {
                            $(".departamentos").append('<option value="' + respuesta[4][i].numubigeo + '">' + respuesta[4][i].departamento + '</option>');
                        }
                    }

//                        PROVINCIAS
                    for(i=0; i<respuesta[5].length ; i++){
                        if(respuesta[5][i].id == id_provincia){
                            $(".edit_provincias").append('<option selected="selected" value="'+respuesta[5][i].numubigeo+'">' + respuesta[5][i].provincia + '</option>');
                        }
                        else {
                            $(".edit_provincias").append('<option value="' + respuesta[5][i].numubigeo + '">' + respuesta[5][i].provincia + '</option>');
                        }
                    }

//                        DISTRITOS
                    for(i=0; i<respuesta[6].length ; i++){
                        if(respuesta[6][i].id == id_distrito){
                            $(".edit_distritos").append('<option selected="selected" value="'+respuesta[6][i].id+'">' + respuesta[6][i].distrito + '</option>');
                        }
                        else {
                            $(".edit_distritos").append('<option value="' + respuesta[6][i].id + '">' + respuesta[6][i].distrito + '</option>');
                        }
                    }
                }
            });
            $("#clienteid").val($("#cliente_idcontado").val());
            $('#actualizar_cliente').modal('show');
        }


    </script>

    {{--actualizar datos del cliente--}}
    <script>
        (function() {
            $("#formactualizarcliente").submit(function() {
                var form = $('#formactualizarcliente');
                var id_cliente = $(this).find('input[name="id_cliente"]').val();
                var documento = $(this).find('input[name="nro_documento"]').val();
                var nombresyapellidos = $(this).find('input[name="nombres"]').val() +" "+ $(this).find('input[name="apellidos"]').val();
                var url = form.attr('action')+id_cliente;
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
                        distrito : $(this).find('select[name=distrito]').val(),
                        estado_civil : $(this).find('select[name=estado_civil]').val(),
                        grado_instruccion :$(this).find('select[name=grado_instruccion]').val(),
                        ocupacion : $(this).find('select[name=ocupacion]').val(),
                        fecha_nacimiento: $(this).find('input[name="fecha_nacimiento"]').val(),
                        script : "si"
                    },
                    dataType: 'JSON',
                    success: function() {
                        alert("¡ DATOS ACTUALIZADOS CORRECTAMENTE !");
                        $('#actualizar_cliente').modal('hide');
                        $('#cliente_contado').modal('hide');
                        $("#documento").val(documento);
                        $("#nombresyapellidos").val(nombresyapellidos);
                        $("#detalle_documento").val(documento);
                        $("#detalle_nombres").val(nombresyapellidos);

                        document.getElementById("formactualizarcliente").reset();
                    }
                });

            });
        }).call(this);
    </script>

    {{--Aprobar Cliente--}}
    <script>
        function aprobarCliente(){
            $('#clienteid').val($('#actualizardatos').val());
            $("#documento").val($("#detalle_documento").val());
            $("#nombresyapellidos").val($("#detalle_nombres").val());
            $('#detalle_cliente').modal('hide');
            $('#evaluar_cliente').modal('hide');

        }
    </script>

</div>