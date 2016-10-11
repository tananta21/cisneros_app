<?php

namespace App\Http\Controllers;

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

    public function __construct(ProductoRepository $producto)
    {
        $this->repoProducto = $producto;
        $this->repoVenta = new VentaRepository();
        $this->repoDetalleVenta = new DetalleVentaRepository();
    }

    public function index()
    {
        $nro_venta = ($this->repoVenta->all())+1;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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
}
