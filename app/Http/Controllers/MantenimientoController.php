<?php

namespace App\Http\Controllers;

use App\Core\Categoria\CategoriaRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MantenimientoController extends Controller
{
    protected $repoCategoria;

    public function __construct(){
        $this->repoCategoria = new CategoriaRepository();
    }

    public function index()
    {

    }

//    mantenimiento categoria: listar categoria
    public function listarCategoria(){
        $categorias = $this->repoCategoria->all();
        return view('mantenimiento.categoria.listacategoria', compact('categorias'));
    }
//  crear categoria
    public function crearCategoria(){
        $inputs = Input::all();
        $modeloNuevo = $this->repoCategoria->nuevaCategoria($inputs);
        return Redirect::back();
    }

    //editarCategoria
    public function editarCategoria(){
        $id_categoria = Input::get('idcategoria');
        $editarcategoria = $this->repoCategoria->editarCategoria($id_categoria);
        return response()->json($editarcategoria);
    }
//    eliminar categoria: cambiar de estado
    public function eliminarCategoria()
    {
        $id_categoria = Input::get('idcategoria');
        $id = json_decode(json_encode($id_categoria));
        $eliminarCategoria = $this->repoCategoria->eliminarCatego($id);
        return response()->json();
    }
//    actualizar categoria
    public function actualizarCategoria(){
        $inputs = Input::all();
        $categoria = $this->repoCategoria->actualizarCategoria($inputs);
        return Redirect::back();
    }
//    buscar categoria
    public function buscarCategoria(){
        $descripcion = Input::get('descripcioncategoria');
        $estado = Input::get('estado');
        $categorias = $this->repoCategoria->busquedaCategoria($descripcion,$estado);
        return view('mantenimiento.categoria.listacategoria', compact('categorias'));
    }

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
