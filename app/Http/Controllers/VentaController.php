<?php

namespace App\Http\Controllers;

use App\Core\Cliente\ClienteRepository;
use App\Core\CronogramaCobro\CronogramaCobroRepository;
use App\Core\DetalleVenta\DetalleVentaRepository;
use App\Core\Producto\ProductoRepository;
use App\Core\Venta\VentaRepository;
use App\Http\Requests;
use Carbon\Carbon;
use Faker\Provider\zh_CN\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class VentaController extends Controller
{

    protected $repoProducto;
    protected $repoVenta;
    protected $repoDetalleVenta;
    protected $repoCliente;
    protected $repoCronograma;

    public function __construct(ProductoRepository $producto)
    {
        $this->repoProducto = $producto;
        $this->repoVenta = new VentaRepository();
        $this->repoDetalleVenta = new DetalleVentaRepository();
        $this->repoCliente = new ClienteRepository();
        $this->repoCronograma = new CronogramaCobroRepository() ;
    }

    public function index()
    {
        $value = $this->repoVenta->all();
        $nro_venta = ($value[0]->id)+1;
        return view('venta.venta.nuevaventa',compact('nro_venta'));
    }

    public function create()
    {

    }

    public function registroVenta(){
        $id_producto = Input::get('idproducto');
        $cantidad = Input::get('cantidad');
        $precio = Input::get('precio');
        $nro_venta = Input::get('nro_venta');
        $cliente_id = Input::get("cliente_id");
        $empleado_id = Input::get("empleado_id");
        $tipo_venta_id = Input::get("tipo_venta");
        $fecha_venta = Carbon::parse(strtotime(Input::get("fecha_venta")))->format('Y-m-d');
        $tipo_comprobante_id = 1;

        $venta = $this->repoVenta->addVenta($cliente_id,$empleado_id,$tipo_comprobante_id,$tipo_venta_id,$fecha_venta );

        $id_productos = json_decode(json_encode($id_producto));
        $cantidades = json_decode(json_encode($cantidad));
        $precios = json_decode(json_encode($precio));

        $total = 0;
        for($i=0;  $i<count($id_productos); $i++){
//            dd($id_productos[$i]->value);
            $detalle = $this->repoDetalleVenta->addDetalleVenta($nro_venta,$id_productos[$i]->value, $precios[$i]->value,$cantidades[$i]->value);
            $total = $total + $precios[$i]->value;
        }
        if($tipo_venta_id==1)
        {
            $cuota = 1;
            $estado = 1;
            $nuevocronograma = $this->repoCronograma->registrarCronograma($nro_venta,$fecha_venta,$cuota,$total,$estado);
        }
        return response()->json();
    }


    //    registrar cronograma de cobro
    public function registrarCronograma(){
        $fecha_pagos = Input::get("fecha_pago");
        $monto_pagos = Input::get("monto_pago");
        $estado_pagos = Input::get("estado_pago");
        $nro_venta = Input::get("nro_venta");
        $deletecrono = $this->repoCronograma->deleted($nro_venta);
        for($i=0;  $i<count($monto_pagos); $i++){
            $cuota = $i+1;
            $nuevocronograma = $this->repoCronograma->registrarCronograma($nro_venta,$fecha_pagos[$i]["value"],$cuota,$monto_pagos[$i]["value"],$estado_pagos[$i]["value"]);
        }
        return response()->json();

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {


    }

    public function buscarProducto()
    {

        $codigo = Input::get('codigo');
        $tipo = Input::get('tipo');
        $productos = $this->repoProducto->productoEnVentas($codigo, $tipo);
//        dd($productos);
        if (empty($productos)) {
            return 0;
        } else {
            return response()->json($productos);
        }
    }

    public function buscarClienteEnVentas(){
        $cliente = $this->repoCliente->buscarCliente(Input::get("cliente"))->toArray();
        if (empty($cliente)) {
            return 0;
        } else {
            return response()->json($cliente);
        }

    }

    public function detalleClienteEnVentas(){
        $total_venta = $this->repoVenta->totalVentaCliente(Input::get("cliente"));
        $cliente = $this->repoCliente->buscarClienteById(Input::get("cliente"))->toArray();
        $nuevos = $this->repoCliente->buscarClienteById(Input::get("cliente"))->toArray();
        $año_actual = date("Y");
        $canti_ventas = $this->repoCliente->cantVentas(Input::get("cliente"),$año_actual);
        $datos = array($total_venta,$cliente,$nuevos,$canti_ventas);
        if (empty($datos)) {
            return 0;
        } else {
            return response()->json($datos);
        }
    }

    public function grafCliente(){

        if(Input::get("tipo_graf")==1){
            $canti_ventas = $this->repoCliente->cantVentas(Input::get("cliente"),Input::get("año_graf"));
            $datos = array($canti_ventas);
            if (empty($datos)) {
                return 0;
            } else {
                return response()->json($datos);
            }
        }
        elseif(Input::get("tipo_graf")==2){
            $canti_ventas = $this->repoCliente->promVentas(Input::get("cliente"),Input::get("año_graf"));
            $datos = array($canti_ventas);
            if (empty($datos)) {
                return 0;
            } else {
                return response()->json($datos);
            }
        }




    }

}
