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

    public function modulos(){
        $categorias = $this->repoModulo->allModulos();
        return view("seguridad.modulos.modulo",compact('categorias'));
    }

    public function accesos(){
        $tipo_empleado = $this->tipoEmpleado->listaSelect();
        $valor = "1";
        $descripcion = $this->tipoEmpleado->selectDescripcion($valor);
        $modulos = $this->repoAcceso->buscarModulos($valor);
        $submodulos = $this->repoAcceso->buscarSubmodulos($valor);
        return view("seguridad.accesos.acceso", compact('tipo_empleado','modulos','submodulos','descripcion'));
    }
    public function buscarAccesos(){
        $tipo_empleado = $this->tipoEmpleado->listaSelect();
        $valor = Input::get("tipo_empleado");
        $descripcion = $this->tipoEmpleado->selectDescripcion($valor);
        $modulos = $this->repoAcceso->buscarModulos($valor);
        $submodulos = $this->repoAcceso->buscarSubmodulos($valor);
        return view("seguridad.accesos.acceso", compact('tipo_empleado','modulos','submodulos','descripcion'));

    }
    public function actualizarAccesos(){
        $idmodulos = Input::get('idmodulos');
        $idsubmodulos = Input::get('idsubmodulos');
        $modulos = Input::get('estadomodulo');
        $submodulos = Input::get('estadosubmodulo');
        $cantidad_modulos = count($modulos);
        $cantidad_submodulos = count($submodulos);
        for($i=0;$i< $cantidad_modulos; $i++ ){
            $actualizar_modulo = $this->repoAcceso->actualizarAcceso($idmodulos[$i]['value'],$modulos[$i]);
            }

        for($i=0;$i< $cantidad_submodulos; $i++ ){
            $actualizar_submodulo = $this->repoAcceso->actualizarAcceso($idsubmodulos[$i]['value'],$submodulos[$i]);
            }
        return response()->json();
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
