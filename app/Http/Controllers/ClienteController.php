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
        $script = Input::get("script");
        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        $departamentos = $this->repoUbigeo->allDepartamentos();
        if(!empty($script)){
            $datos = array($estadoCiviles,$ocupaciones,$gradoInstrucciones,$departamentos);
            return response()->json($datos);
        }
        else{
            return view('venta.cliente.registrarcliente', compact('estadoCiviles','ocupaciones','gradoInstrucciones','departamentos'));
        }

    }

    public function create()
    {
       $datos = Input::all();
       $script = Input::get("script");
       $clienteNuevo = $this->repoCliente->registrarCliente($datos);
        if(!empty($script))
        {
            return response()->json();
        }
        else{
            return redirect()->action('ClienteController@index');
        }
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
        $script = Input::get("script");

        $numubigeo = $this->repoUbigeo->buscarNumubigeo($cliente["ubigeo_id"]);
        $departamento_id = $this->repoUbigeo->buscarUnDepartamento(substr($numubigeo[0]["numubigeo"],0,2))->toArray();
        $provincia_id = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,4))->toArray();
        $distrito_id = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,6))->toArray();


        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        $departamentos = $this->repoUbigeo->allDepartamentos();
        $provincias = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,2));
        $distritos = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,4));

        if(!empty($script))
        {
            $datos = array($cliente,$estadoCiviles,$ocupaciones,$gradoInstrucciones,$departamentos,$provincias,$distritos,$departamento_id,$provincia_id,$distrito_id);
            return response()->json($datos);
        }
        else{
            return view('venta.cliente.editarcliente',compact('cliente',
                'estadoCiviles','ocupaciones','gradoInstrucciones','departamentos','provincias','distritos','departamento_id','provincia_id','distrito_id'));
        }



    }


    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $script= $request->get("script");
        $actualizarRegistro = $this->repoCliente->updated($id, $datos);
        if(!empty($script))
        {
            return response()->json();
        }
        else {
            return redirect()->action('ClienteController@index');
        }
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
