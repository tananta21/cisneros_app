<?php

namespace App\Http\Controllers;

use App\Core\Cliente\ClienteRepository;
use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ClienteController extends Controller
{

    protected $repoCliente;
    protected $repoEstadoCivil;
    protected $repoOcupacion;
    protected $repoGradoInstruccion;

    public function __construct(){

        $this->repoCliente = new ClienteRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoOcupacion = new OcupacionRepository();
    }

    public function index()
    {
        $clientes = $this->repoCliente->all();
        return view('venta.cliente.listacliente', compact('clientes'));
    }

    public function nuevoCliente(){
        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        return view('venta.cliente.registrarcliente', compact('estadoCiviles','ocupaciones','gradoInstrucciones'));
    }

    public function create()
    {
       $datos = Input::all();
       $clienteNuevo = $this->repoCliente->registrarCliente($datos);
        return redirect()->action('ClienteController@index');

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


    public function edit($id)
    {
        $cliente = $this->repoCliente->find($id);
        $estado = $cliente['estado_civil_id'];
        $grados= $cliente['grado_instruccion_id'];
        $ocupacion_id= $cliente['ocupacion_id'];

        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();

        return view('venta.cliente.editarcliente',compact('cliente','estado','ocupacion_id','grados','estadoCiviles','ocupaciones','gradoInstrucciones'));

    }


    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $actualizarRegistro = $this->repoCliente->updated($id, $datos);
        return redirect()->action('ClienteController@index');
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
    public function buscarCliente(){
        $dato = Input::get('cliente');
        $clientes = $this->repoCliente->buscarCliente($dato);
        return view('venta.cliente.listacliente', compact('clientes'));
    }
}
