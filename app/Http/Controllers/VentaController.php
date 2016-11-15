<?php

namespace App\Http\Controllers;

use App\Core\Cliente\ClienteRepository;
use App\Core\DetalleVenta\DetalleVentaRepository;
use App\Core\Producto\ProductoRepository;
use App\Core\Venta\VentaRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class VentaController extends Controller
{

    protected $repoProducto;
    protected $repoVenta;
    protected $repoDetalleVenta;
    protected $repoCliente;

    public function __construct(ProductoRepository $producto)
    {
        $this->repoProducto = $producto;
        $this->repoVenta = new VentaRepository();
        $this->repoDetalleVenta = new DetalleVentaRepository();
        $this->repoCliente = new ClienteRepository();
    }

    public function index()
    {
        $nro_venta = $this->repoVenta->all()->toArray();
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
        $cliente_id = 1;
        $empleado_id = 1;
        $tipo_comprobante_id = 1;
        $tipo_transaccion_id = 1;

        $venta = $this->repoVenta->addVenta($cliente_id,$empleado_id,$tipo_comprobante_id,$tipo_transaccion_id );

        $id_productos = json_decode(json_encode($id_producto));
        $cantidades = json_decode(json_encode($cantidad));
        $precios = json_decode(json_encode($precio));

        for($i=0;  $i<count($id_productos); $i++){
//            dd($id_productos[$i]->value);
            $detalle = $this->repoDetalleVenta->addDetalleVenta($nro_venta,$id_productos[$i]->value, $precios[$i]->value,$cantidades[$i]->value);
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
        $datos = array($total_venta,$cliente,$nuevos);
        if (empty($datos)) {
            return 0;
        } else {
            return response()->json($datos);
        }



    }
}
