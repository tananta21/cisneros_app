<?php

namespace App\Http\Controllers;

use App\Core\Acceso\AccesoRepository;
use App\Core\Modulo\ModuloRepository;
use App\Core\TipoEmpleado\TipoEmpleadoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AccesoModuloController extends Controller
{
    protected $tipoEmpleado;
    protected $repoAcceso;
    protected $repoModulo;

    public function __construct(){
        $this->tipoEmpleado = new TipoEmpleadoRepository();
        $this->repoAcceso = new AccesoRepository();
        $this->repoModulo = new ModuloRepository();
    }

    public function accesos(){
        $tipo_empleado = $this->tipoEmpleado->listaSelect();
        $valor = "1";
        $descripcion = $this->tipoEmpleado->selectDescripcion($valor);
        $modulos = $this->repoAcceso->buscarModulos($valor);
        $submodulos = $this->repoAcceso->buscarSubmodulos($valor);
        return view("seguridad.accesos.acceso", compact('tipo_empleado','modulos','submodulos','descripcion','valor'));
    }
    public function buscarAccesos(){
        $tipo_empleado = $this->tipoEmpleado->listaSelect();
        $valor = Input::get("tipo_empleado");
        $descripcion = $this->tipoEmpleado->selectDescripcion($valor);
        $modulos = $this->repoAcceso->buscarModulos($valor);
        $submodulos = $this->repoAcceso->buscarSubmodulos($valor);
        return view("seguridad.accesos.acceso", compact('tipo_empleado','modulos','submodulos','descripcion','valor'));

    }

    public function actualizarAccesos(){
        $idmodulos = Input::get('idmodulos');
        $idsubmodulos = Input::get('idsubmodulos');
        $estadomodulos = Input::get('estadomodulo');
        $estadosubmodulos = Input::get('estadosubmodulo');
        $tipo_empleado =  Input::get('tipo');
        $cantidad_modulos = count($estadomodulos);
        $cantidad_submodulos = count($estadosubmodulos);

        for($i=0;$i< $cantidad_modulos; $i++ ){
            $actualizar_modulo = $this->repoAcceso->actualizarAcceso($tipo_empleado,$idmodulos[$i]['value'],$estadomodulos[$i]);
         }

        for($i=0;$i< $cantidad_submodulos; $i++ ){
            $actualizar_submodulo = $this->repoAcceso->actualizarAcceso($tipo_empleado,$idsubmodulos[$i]['value'],$estadosubmodulos[$i]);
            }
        return response()->json();
        }



//    MODULOS DEL SISTEMA
    public function modulos(){
        $modulos = $this->repoModulo->allModulos();
        $submodulos = $this->repoModulo->allSubModulos();
        return view("seguridad.modulos.modulo",compact('modulos','submodulos'));
    }

    public function buscarModulo(){
        $modulo = $this->repoModulo->find(Input::get('idmodulo'));
        return response()->json($modulo);
    }

    public function actualizarModulo(){
        $atributos = Input::all();
        $modulo = $this->repoModulo->updated(Input::get('modulo_id'),$atributos);
        return redirect()->action('AccesoModuloController@modulos');
    }



    public function index()
    {
        //
    }


    public function create()
    {
        //
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
        //
    }


}
