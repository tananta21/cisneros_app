<?php

namespace App\Http\Controllers;

use App\Core\TipoComprobante\TipoComprobanteRepository;
use App\Core\TipoPago\TipoPago;
use App\Core\TipoPago\TipoPagoRepository;
use App\Core\TipoTransaccion\TipoTransaccionRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MantenimientoCompraVentaController extends Controller
{
    protected $repoTipoComprobante;
    protected $repoTipoPago;
    protected $repoTipoTransaccion;

    public function __construct()
    {
        $this->repoTipoComprobante = new TipoComprobanteRepository();
        $this->repoTipoPago = new TipoPagoRepository();
        $this->repoTipoTransaccion = new TipoTransaccionRepository();

    }

//    ==========================================================================================================================
//      TIPO COMPROBANTE
//    mantenimiento tipo comprobante: listar
    public function listaTipoComprobante(){
        $marcas = $this->repoTipoComprobante->all();
        return view('mantenimiento.compraventa.tipocomprobante.listatipocomprobante', compact('marcas'));
    }

//  crear tipo
    public function crearTipoComprobante(){
        $inputs = Input::all();
        $registronuevo = $this->repoTipoComprobante->crearTipoComprobante($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarTipoComprobante(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoTipoComprobante->editarTipoComprobante($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarTipoComprobante(){
        $inputs = Input::all();
        $registro = $this->repoTipoComprobante->actualizarTipoComprobante($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarTipoComprobante()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoTipoComprobante->eliminarTipoComprobante($id);
        return response()->json();
    }

    //    buscar
    public function buscarTipoComprobante(){
        $estado = Input::get('estado');
        $marcas = $this->repoTipoComprobante->buscarTipoComprobante($estado);
        return view('mantenimiento.compraventa.tipocomprobante.listatipocomprobante', compact('marcas'));
    }





//    ==========================================================================================================================
//      TIPO PAGOS
//    mantenimiento tipo pago: listar
    public function listaTipoPago(){
        $marcas = $this->repoTipoPago->all();
        return view('mantenimiento.compraventa.tipopago.listatipopago', compact('marcas'));
    }

//  crear tipo
    public function crearTipoPago(){
        $inputs = Input::all();
        $registronuevo = $this->repoTipoPago->crearTipoPago($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarTipoPago(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoTipoPago->editarTipoPago($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarTipoPago(){
        $inputs = Input::all();
        $registro = $this->repoTipoPago->actualizarTipoPago($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarTipoPago()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoTipoPago->eliminarTipoPago($id);
        return response()->json();
    }

    //    buscar
    public function buscarTipoPago(){
        $estado = Input::get('estado');
        $marcas = $this->repoTipoPago->buscarTipoPago($estado);
        return view('mantenimiento.compraventa.tipopago.listatipopago', compact('marcas'));
    }



//    ==========================================================================================================================
//      TIPO TRANSACCION
//    mantenimiento tipo pago: listar
    public function listaTipoTransaccion(){
        $marcas = $this->repoTipoTransaccion->all();
        return view('mantenimiento.compraventa.tipotransaccion.listatipotransaccion', compact('marcas'));
    }

//  crear tipo
    public function crearTipoTransaccion(){
        $inputs = Input::all();
        $registronuevo = $this->repoTipoTransaccion->crearTipoTransaccion($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarTipoTransaccion(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoTipoTransaccion->editarTipoTransaccion($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarTipoTransaccion(){
        $inputs = Input::all();
        $registro = $this->repoTipoTransaccion->actualizarTipoTransaccion($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarTipoTransaccion()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoTipoTransaccion->eliminarTipoTransaccion($id);
        return response()->json();
    }

    //    buscar
    public function buscarTipoTransaccion(){
        $estado = Input::get('estado');
        $marcas = $this->repoTipoTransaccion->buscarTipoTransaccion($estado);
        return view('mantenimiento.compraventa.tipotransaccion.listatipotransaccion', compact('marcas'));
    }









    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
