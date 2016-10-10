<?php

namespace App\Http\Controllers;

use App\Core\Empleado\EmpleadoRepository;
use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use App\Core\TipoEmpleado\TipoEmpleadoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EmpleadoController extends Controller
{
    protected $repoEmpleado;
    protected $repoTipoEmpleado;
    protected $repoEstadoCivil;
    protected $repoOcupacion;
    protected $repoGradoInstruccion;

    public function __construct()
    {
        $this->repoEmpleado = new EmpleadoRepository();
        $this->repoTipoEmpleado = new TipoEmpleadoRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoOcupacion = new OcupacionRepository();
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
        return view('seguridad.empleado.registrarempleado', compact('tipoEmpleados', 'estadoCiviles', 'ocupaciones', 'gradoInstrucciones'));
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
        $tipo =  $empleado['tipo_empleado_id'];
        $estado = $empleado['estado_civil_id'];
        $grados= $empleado['grado_instruccion_id'];
        $ocupacion_id= $empleado['ocupacion_id'];

        $tipoEmpleados = $this->repoTipoEmpleado->allEnVista();
        $estadoCiviles = $this->repoEstadoCivil->allEnVista();
        $ocupaciones = $this->repoOcupacion->allEnVista();
        $gradoInstrucciones = $this->repoGradoInstruccion->allEnVista();
        return view('seguridad.empleado.editarempleado',compact('empleado','estado','ocupacion_id','grados','tipo','tipoEmpleados','estadoCiviles','ocupaciones','gradoInstrucciones'));
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
