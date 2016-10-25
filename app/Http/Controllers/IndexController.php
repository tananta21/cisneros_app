<?php

namespace App\Http\Controllers;

use App\Acceso;
use App\Core\Modulo\ModuloRepository;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $repoModulo;

    public function __construct(){
        $this->repoModulo = new ModuloRepository();
    }

    public function index()
    {
        $modulos = $this->repoModulo->allModulos();
        $consulta = \App\Core\Acceso\Acceso
            ::join('modulos', 'accesos.modulo_id', '=', 'modulos.id')
            ->select('modulos.descripcion','modulos.icono','modulos.id as id')
            ->whereRaw("tipo_empleado_id = 1 and accesos.estado = 1")
            ->get();
//            dd($consulta->toArray());
        $submodulos = $this->repoModulo->allSubModulos();
        return view('index', compact('modulos','submodulos'));
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
