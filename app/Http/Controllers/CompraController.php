<?php

namespace App\Http\Controllers;

use App\Core\Compra\CompraRepository;
use App\Core\DetalleCompra\DetalleCompraRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CompraController extends Controller
{
    protected $repoCompra;
    protected $repoDetalleCompra;

    public function __construct(){
        $this->repoCompra = new CompraRepository();
        $this->repoDetalleCompra = new DetalleCompraRepository();
    }

    public function index()
    {
        $nro_compra = $this->repoCompra->all()->toArray();
        return view('compra.compra.compranueva',compact('nro_compra'));
    }

    public function registroCompra(){
        $id_producto = Input::get('idproducto');
        $cantidad = Input::get('cantidad');
        $precio = Input::get('precio');
        $nro_compra = Input::get('nrocompra');
        $proveedor_id = 1;
        $empleado_id = 1;
        $tipo_comprobante_id = 1;
        $tipo_transaccion_id = 1;

        $compra = $this->repoCompra->addCompra($proveedor_id,$empleado_id,$tipo_comprobante_id,$tipo_transaccion_id );

        $id_productos = json_decode(json_encode($id_producto));
        $cantidades = json_decode(json_encode($cantidad));
        $precios = json_decode(json_encode($precio));

        for($i=0;  $i<count($id_productos); $i++){
//            dd($id_productos[$i]->value);
            $detalle = $this->repoDetalleCompra->addDetalleCompra($nro_compra,$id_productos[$i]->value, $precios[$i]->value,$cantidades[$i]->value);
        }
        return response()->json();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
