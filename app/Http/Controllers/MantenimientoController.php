<?php

namespace App\Http\Controllers;

use App\Core\Categoria\CategoriaRepository;
use App\Core\Marca\MarcaRepository;
use App\Core\Modelo\ModeloRepository;
use App\Core\TipoProducto\TipoProductoRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MantenimientoController extends Controller
{
    protected $repoCategoria;
    protected $repoMarca;
    protected $repoModelo;
    protected $repoTipoProducto;
    protected $repoUnidadMedida;

    public function __construct(){
        $this->repoCategoria = new CategoriaRepository();
        $this->repoMarca = new MarcaRepository();
        $this->repoModelo = new ModeloRepository();
        $this->repoTipoProducto = new TipoProductoRepository();
//        falta unidad de medida
    }

    public function index()
    {

    }

//    ==========================================================================================================================
//      CATEGORIAS
//    mantenimiento categoria: listar categoria
    public function listarCategoria(){
        $categorias = $this->repoCategoria->all();
        return view('mantenimiento.producto.categoria.listacategoria', compact('categorias'));
    }
//  crear categoria
    public function crearCategoria(){
        $inputs = Input::all();
        $categoriaNuevo = $this->repoCategoria->nuevaCategoria($inputs);
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
        return view('mantenimiento.producto.categoria.listacategoria', compact('categorias'));
    }

//    ==========================================================================================================================
//      MARCAS
//    mantenimiento marca: listar marca
    public function listarMarca(){
        $marcas = $this->repoMarca->all();
        return view('mantenimiento.producto.marca.listamarca', compact('marcas'));
    }
    //  crear marca
    public function crearMarca(){
        $inputs = Input::all();
        $marcaNuevo = $this->repoMarca->nuevaMarca($inputs);
        return Redirect::back();
    }

    //editarCategoria
    public function editarMarca(){
        $id_categoria = Input::get('idmarca');
        $editarcategoria = $this->repoMarca->editarMarca($id_categoria);
        return response()->json($editarcategoria);
    }
    //    actualizar categoria
    public function actualizarMarca(){
        $inputs = Input::all();
        $categoria = $this->repoMarca->actualizarMarca($inputs);
        return Redirect::back();
    }
//    eliminar marca: cambiar de estado
    public function eliminarMarca()
    {
        $id_marca = Input::get('idmarca');
        $id = json_decode(json_encode($id_marca));
        $eliminarMarca = $this->repoMarca->eliminarMarca($id);
        return response()->json();
    }
//    buscar marca
    public function buscarMarca(){
        $descripcion = Input::get('descripcionmarca');
        $estado = Input::get('estado');
        $marcas = $this->repoMarca->busquedaMarca($descripcion,$estado);
        return view('mantenimiento.producto.marca.listamarca', compact('marcas'));
    }

//    ==========================================================================================================================
//      MODELOS
//    mantenimiento marca: listar modelos

    public function listarModelo(){
        $marcas = $this->repoModelo->all();
        return view('mantenimiento.producto.modelo.listamodelo', compact('marcas'));
    }

//  crear modelo
    public function crearModelo(){
        $inputs = Input::all();
        $registronuevo = $this->repoModelo->nuevoModelo($inputs);
        return Redirect::back();
    }

    //editar registro
    public function editarModelo(){
        $id_recuperado = Input::get('id');
        $registro = $this->repoModelo->editarModelo($id_recuperado);
        return response()->json($registro);
    }
    //    actualizar registro
    public function actualizarModelo(){
        $inputs = Input::all();
        $registro = $this->repoModelo->actualizarModelo($inputs);
        return Redirect::back();
    }

    //    eliminar :cambiar de estado
    public function eliminarModelo()
    {
        $id_recuperado = Input::get('id');
        $id = json_decode(json_encode($id_recuperado));
        $eliminardato = $this->repoModelo->eliminarModelo($id);
        return response()->json();
    }

    //    buscar modelo
    public function buscarModelo(){
        $descripcion = Input::get('descripcionmarca');
        $estado = Input::get('estado');
        $marcas = $this->repoModelo->busquedaModelo($descripcion,$estado);
        return view('mantenimiento.producto.modelo.listamodelo', compact('marcas'));
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
