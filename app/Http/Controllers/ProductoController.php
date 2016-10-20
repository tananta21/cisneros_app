<?php

namespace App\Http\Controllers;

use App\Core\Categoria\CategoriaRepository;
use App\Core\Marca\MarcaRepository;
use App\Core\Modelo\ModeloRepository;
use App\Core\Producto\ProductoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    protected $repoProducto;
    protected $repoCategoria;
    protected $repoMarca;
    protected $repoModelo;

    public function __construct()
    {
        $this->repoProducto = new ProductoRepository();
        $this->repoCategoria = new CategoriaRepository();
        $this->repoMarca = new MarcaRepository();
        $this->repoModelo = new ModeloRepository();

    }

    public function index()
    {
        $tipo = 1;
        $productos = $this->repoProducto->todoProductos($tipo);
        $tipo_producto = ["id"=>1];
        return View('inventario.productos.productos', compact('productos','tipo_producto'));
    }

    public function nuevoProducto(){

        $categorias = $this->repoCategoria->allEnProducto();
        $marcas = $this->repoMarca->allEnProducto();
        return View('inventario.productos.registrarproducto', compact('categorias','marcas'));
    }


    public function create()
    {
        $inputs = Input::all();
        $productoNuevo = $this->repoProducto->addProducto($inputs);
        return redirect()->action('ProductoController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

        $categorias = $this->repoCategoria->allEnProducto();
        $marcas = $this->repoMarca->all();
        $editarProducto = $this->repoProducto->find($id);
        if($editarProducto["tipo_producto_id"]==2){
            return View('inventario.productos.editarservicio', compact( 'editarProducto'));
        }
        else{
            $id_modelo = $editarProducto["modelo_id"];
            $marca_id = $this->repoModelo->marcaDeModelo($id_modelo)->toArray();
            $marca_seleccionada = $marca_id[0]['marca_id'];
            $modelos = $this->repoModelo->modelosDeMarca($marca_seleccionada);
            return View('inventario.productos.editarproducto', compact('marca_seleccionada','editarProducto','categorias' ,'marcas','modelos'));
        }
    }


    public function update(Request $request, $id)
    {
        $actualizarProducto = $request->all();
        $tipo_producto = ["id"=>$request->get('tipo_producto')];
        $producto = $this->repoProducto->updated($id, $actualizarProducto);
        $productos = $this->repoProducto->todoProductos($request->get('tipo_producto'));
        return View('inventario.productos.productos', compact('productos','tipo_producto'));
    }


    public function destroy($id)
    {
        $eliminarProducto = $this->repoProducto->deleted($id);
        return redirect()->action('ProductoController@index');
    }

    public function eliminarProducto()
    {
        $id_producto = Input::get('idproducto');
        $id = json_decode(json_encode($id_producto));
        $eliminarProducto = $this->repoProducto->deleted($id);
        return response()->json();
    }


    public function buscarProducto(Request $request)
    {
        $variables = $request->all();

        $productos = $this->repoProducto->buscarProducto($variables);
        return View('inventario.productos.productos', compact('productos'));

    }

    public function busquedaProducto()
    {
        $serie  = Input::get('serie');
        $estado = Input::get('estado');
        $tipo = Input::get("tipo");
        $tipo_producto = ["id"=>$tipo];

        $productos = $this->repoProducto->busquedaProducto($tipo,$serie,$estado);
        return View('inventario.productos.productos', compact('productos',"tipo_producto"));

    }

//    public function createCategoria(){
//        $inputs = Input::all();
//        $modeloNuevo = $this->repoCategoria->addCategoria($inputs);
//        return Redirect::back();
//    }
    public function createMarca(){
        $inputs = Input::all();
        $modeloNuevo = $this->repoMarca->addMarca($inputs);
        return Redirect::back();
    }

    public function createModelo(){
        $inputs = Input::all();

        $modeloNuevo = $this->repoModelo->addModelo($inputs);
        return Redirect::back();
    }

    public function buscarModelo(){
        $marca = Input::get('marca');
        $modelos = $this->repoModelo->allEnProducto($marca);
        if (empty($modelos)) {
            return 0;
        } else {
            return response()->json($modelos);
        }
    }


//    registrar categoria desde producto
    public function registrarCategoria(){
        $datos = Input::all();
        $categoria = $this->repoCategoria->nuevaCategoria($datos);
        $ultimo = $this->repoCategoria->ultimaCategoria()->toArray();
        return response()->json($ultimo);
    }
    public function registrarMarca(){
        $datos = Input::all();
        $marca = $this->repoMarca->nuevaMarca($datos);
        $ultimo = $this->repoMarca->ultimaMarca()->toArray();
        return response()->json($ultimo);
    }
    public function registrarModelo(){
        $datos = Input::all();
        $marca = $this->repoModelo->nuevoModelo($datos);
        return response()->json();
    }

    public function buscarMarcas(){
        $marcas = $this->repoMarca->allEnProducto()->toArray();
        return response()->json($marcas);
    }
}
