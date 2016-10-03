<?php

namespace App\Http\Controllers;

use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use App\Core\TipoEmpleado\TipoEmpleadoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MantenimientoEmpleadoController extends Controller
{
    protected $repoTipoEmpleado;
    protected $repoEstadoCivil;
    protected $repoGradoInstruccion;
    protected $repoOcupacion;

    public function __construct(){
        $this->repoTipoEmpleado = new TipoEmpleadoRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoOcupacion = new OcupacionRepository();

    }

//    ==========================================================================================================================
//      TIPO EMPLEADOS
//    mantenimiento tipo empleado: listar categoria
    public function listarTipoEmpleado(){
        $marcas = $this->repoTipoEmpleado->all();
        return view('mantenimiento.empleado.tipoempleado.listatipoempleado', compact('marcas'));
    }

//  crear tipo
    public function crearTipoEmpleado(){
        $inputs = Input::all();
        $registronuevo = $this->repoTipoEmpleado->nuevoTipoEmpleado($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarTipoEmpleado(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoTipoEmpleado->editarTipoEmpleado($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarTipoEmpleado(){
        $inputs = Input::all();
        $registro = $this->repoTipoEmpleado->actualizarTipoEmpleado($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarTipoEmpleado()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoTipoEmpleado->eliminarTipoEmpleado($id);
        return response()->json();
    }

    //    buscar
    public function buscarTipoEmpleado(){
        $estado = Input::get('estado');
        $marcas = $this->repoTipoEmpleado->buscarTipoEmpleado($estado);
        return view('mantenimiento.empleado.tipoempleado.listatipoempleado', compact('marcas'));
    }




//    ==========================================================================================================================
//      ESTADO CIVIL
//    mantenimiento tipo empleado: listar categoria
    public function listarEstadoCivil(){
        $marcas = $this->repoEstadoCivil->all();
        return view('mantenimiento.empleado.estadocivil.listaestadocivil', compact('marcas'));
    }

//  crear modelo
    public function crearEstadoCivil(){
        $inputs = Input::all();
        $registronuevo = $this->repoEstadoCivil->crearEstadoCivil($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarEstadoCivil(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoEstadoCivil->editarEstadoCivil($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarEstadoCivil(){
        $inputs = Input::all();
        $registro = $this->repoEstadoCivil->actualizarEstadoCivil($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarEstadoCivil()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoEstadoCivil->eliminarEstadoCivil($id);
        return response()->json();
    }

    //    buscar buscar
    public function buscarEstadoCivil(){
        $estado = Input::get('estado');
        $marcas = $this->repoEstadoCivil->buscarEstadoCivil($estado);
        return view('mantenimiento.empleado.estadocivil.listaestadocivil', compact('marcas'));

    }


//    ==========================================================================================================================
//      GRADO INSTRUCCION
//    mantenimiento grado instruccion : listar categoria

    public function listaGradoInstruccion(){
        $marcas = $this->repoGradoInstruccion->all();
        return view('mantenimiento.empleado.gradoinstruccion.listagradoinstruccion', compact('marcas'));
    }

//  crear
    public function crearGradoInstruccion(){
        $inputs = Input::all();
        $registronuevo = $this->repoGradoInstruccion->crearGradoInstruccion($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarGradoInstruccion(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoGradoInstruccion->editarGradoInstruccion($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarGradoInstruccion(){
        $inputs = Input::all();
        $registro = $this->repoGradoInstruccion->actualizarGradoInstruccion($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarGradoInstruccion()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoGradoInstruccion->eliminarGradoInstruccion($id);
        return response()->json();
    }

    //    buscar
    public function buscarGradoInstruccion(){
        $estado = Input::get('estado');
        $marcas = $this->repoGradoInstruccion->buscarGradoInstruccion($estado);
        return view('mantenimiento.empleado.gradoinstruccion.listagradoinstruccion', compact('marcas'));
    }



//    ==========================================================================================================================
//      OCUPACIONES
//    mantenimiento grado instruccion : listar categoria

    public function listaOcupacion(){
        $marcas = $this->repoOcupacion->all();
        return view('mantenimiento.empleado.ocupacion.listaocupacion', compact('marcas'));
    }

//  crear modelo
    public function crearOcupacion(){
        $inputs = Input::all();
        $registronuevo = $this->repoOcupacion->crearOcupacion($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarOcupacion(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoOcupacion->editarOcupacion($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarOcupacion(){
        $inputs = Input::all();
        $registro = $this->repoOcupacion->actualizarOcupacion($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarOcupacion()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoOcupacion->eliminarOcupacion($id);
        return response()->json();
    }

    //    buscar buscar
    public function buscarOcupacion(){
        $estado = Input::get('estado');
        $marcas = $this->repoOcupacion->buscarOcupacion($estado);
        return view('mantenimiento.empleado.ocupacion.listaocupacion', compact('marcas'));
    }
















    public function index()
    {

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
