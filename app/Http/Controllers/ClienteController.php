<?php

namespace App\Http\Controllers;

use App\Core\Cliente\ClienteRepository;
use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use App\Core\Ubigeo\UbigeoRepository;
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
    protected $repoUbigeo;


    public function __construct(){

        $this->repoCliente = new ClienteRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoOcupacion = new OcupacionRepository();
        $this->repoUbigeo = new UbigeoRepository();
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
        $departamentos = $this->repoUbigeo->allDepartamentos();
        return view('venta.cliente.registrarcliente', compact('estadoCiviles','ocupaciones','gradoInstrucciones','departamentos'));
    }

    public function create()
    {
       $datos = Input::all();
//        dd($datos);
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

        $numubigeo = $this->repoUbigeo->buscarNumubigeo($cliente["ubigeo_id"]);
        $departamento_id = $this->repoUbigeo->buscarUnDepartamento(substr($numubigeo[0]["numubigeo"],0,2))->toArray();
//        dd($departamento_id[0]['id']);
        $provincia_id = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,4));
        $distrito_id = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,6));

        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        $departamentos = $this->repoUbigeo->allDepartamentos();
        $provincias = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,2));
        $distritos = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,4));

        return view('venta.cliente.editarcliente',compact('cliente',
            'estadoCiviles','ocupaciones','gradoInstrucciones','departamentos','provincias','distritos','departamento_id','provincia_id','distrito_id'));

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
