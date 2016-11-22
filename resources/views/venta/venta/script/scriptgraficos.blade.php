<div>
    <script>
        function ventasMes(meses,cantidad){
            var año = $("#año_grafico").val();
            if($("#tipo_grafico").val()==1){
                $(function () {
                var chart = Highcharts.chart('nroVentas', {

                    title: {
                        text: 'Resumen de ventas'
                    },
                    yAxis: {
                        title: {
                            text: 'Nro Ventas'
                        }
                    },

                    subtitle: {
                        text: 'Año '+año
                    },

                    xAxis: {
                        categories: meses,
                        title: {
                            text: 'Meses del Año',
                            style: {
                                fontWeight: 'bold',
                                fontSize: '12px',
                                color: '#303030'
                            }
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: [{
                        name: 'Cantidad',
                        type: 'column',
                        colorByPoint: true,
                        data: cantidad,
                        showInLegend: false
                    }],
                    lang: {
                        noData: "Sin Registros"
                    },
                    noData: {
                        style: {
                            fontWeight: 'bold',
                            fontSize: '15px',
                            color: '#303030'
                        }
                    }
                });


            });
            }
            else{
                $(function () {
                    var chart = Highcharts.chart('nroVentas', {

                        title: {
                            text: 'Promedio de ventas'
                        },
                        yAxis: {
                            title: {
                                text: 'Ventas (S/.)'
                            }
                        },

                        subtitle: {
                            text: 'Año '+año
                        },

                        xAxis: {
                            categories: meses,
                            title: {
                                text: 'Meses del Año',
                                style: {
                                    fontWeight: 'bold',
                                    fontSize: '12px',
                                    color: '#303030'
                                }
                            }
                        },
                        tooltip: {
                            valuePrefix: 'S/. '
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: false
                            }
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: 'S/. {point.y:.1f}'
                                }
                            }
                        },
                        series: [{
                            name: 'Promedio',
                            type: 'column',
                            colorByPoint: true,
                            data: cantidad,
                            showInLegend: false
                        }],
                        lang: {
                            noData: "Sin Registros"
                        },
                        noData: {
                            style: {
                                fontWeight: 'bold',
                                fontSize: '15px',
                                color: '#303030'
                            }
                        }
                    });


                });
            }
        }
    </script>

    <script>
        function grafCliente(){
            var url = '/venta/graficaractividad';
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    cliente: ($("#actualizardatos").val()),
                    tipo_graf: ($("#tipo_grafico").val()),
                    año_graf: ($("#año_grafico").val())
                },
                dataType: 'JSON',
                error: function() {
                    $("#lista_clientes").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {
                    console.log()
                    var meses = new Array();
                    var cantidad = new Array();
//                    console.log(respuesta[0][0].cantidad);
                    for(i=0;i<respuesta[0].length; i++){
                        meses.push((respuesta[0][i].mes).substring(0,3));
                        cantidad.push(parseFloat((respuesta[0][i].cantidad)));
                    }
                    console.log(cantidad)

                    window.onload = ventasMes(meses,cantidad) ;
                }
            });
        }
    </script>
</div>