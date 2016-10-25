<?php

namespace App\Http\Controllers;

use App\Core\Empleado\EmpleadoRepository;
use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use App\Core\TipoEmpleado\TipoEmpleadoRepository;
use App\Core\Ubigeo\UbigeoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class EmpleadoController extends Controller
{
    protected $repoEmpleado;
    protected $repoTipoEmpleado;
    protected $repoEstadoCivil;
    protected $repoOcupacion;
    protected $repoGradoInstruccion;
    protected $repoUbigeo;

    public function __construct()
    {
        $this->repoEmpleado = new EmpleadoRepository();
        $this->repoTipoEmpleado = new TipoEmpleadoRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoOcupacion = new OcupacionRepository();
        $this->repoUbigeo = new UbigeoRepository();
    }

    public function index()
    {
        $empleados = $this->repoEmpleado->all();
        return view('seguridad.empleado.listaempleado', compact('empleados'));
    }

    public function create()
    {
        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        $tipoEmpleados = $this->repoTipoEmpleado->allEnVista();
        $departamentos = $this->repoUbigeo->allDepartamentos();
        return view('seguridad.empleado.registrarempleado', compact('tipoEmpleados', 'estadoCiviles', 'ocupaciones', 'gradoInstrucciones','departamentos'));
    }



    public function nuevoEmpleado()
    {
        $datos = Input::all();
        $nuevoEmpleado = $this->repoEmpleado->nuevoEmpleado($datos);
        return redirect()->action('EmpleadoController@index');
    }

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


    public function edit($id)
    {
        $empleado = $this->repoEmpleado->find($id);
        $numubigeo = $this->repoUbigeo->buscarNumubigeo($empleado["ubigeo_id"]);
        $departamento_id = $this->repoUbigeo->buscarUnDepartamento(substr($numubigeo[0]["numubigeo"],0,2))->toArray();
        $provincia_id = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,4))->toArray();
        $distrito_id = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,6))->toArray();

        $tipoEmpleados = $this->repoTipoEmpleado->allEnVista();
        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        $departamentos = $this->repoUbigeo->allDepartamentos();
        $provincias = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,2));
        $distritos = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,4));
        return view('seguridad.empleado.editarempleado',compact('empleado','tipoEmpleados','empleados','estadoCiviles','ocupaciones','gradoInstrucciones',
            'departamentos','provincias','distritos','departamento_id','provincia_id','distrito_id'));
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
        $datos = $request->all();
        $actualizarRegistro = $this->repoEmpleado->updated($id, $datos);
        return redirect()->action('EmpleadoController@index');
    }


    public function destroy($id)
    {
        //
    }

    public function eliminarEmpleado()
    {
        $id_producto = Input::get('id');
        $id = json_decode(json_encode($id_producto));
        $eliminarRegistro = $this->repoEmpleado->deleted($id);
        return response()->json();
    }

    public function buscarEmpleado(){
        $dato = Input::get('cliente');
        $estado = Input::get('estado');
        $empleados = $this->repoEmpleado->buscarEmpleado($dato,$estado);
        return view('seguridad.empleado.listaempleado', compact('empleados'));
    }

}
