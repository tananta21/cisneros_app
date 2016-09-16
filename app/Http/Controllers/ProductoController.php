<?php

namespace App\Http\Controllers;

use App\Core\Modelo\ModeloRepository;
use App\Core\Producto\ProductoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    protected $repoProducto;
    protected $repoModelo;

    public function __construct()
    {
        $this->repoProducto = new ProductoRepository();
        $this->repoModelo = new ModeloRepository();

    }

    public function index()
    {

        $productos = $this->repoProducto->all();
//        dd($productos);
        return View('inventario.productos.productos', compact('productos'));
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

        $modelos = $this->repoModelo->all();
        $editarProducto = $this->repoProducto->find($id);
        $id_modelo = $editarProducto["modelo_id"];
        return View('inventario.productos.editarproducto', compact('id_modelo', 'editarProducto', 'modelos'));
    }


    public function update(Request $request, $id)
    {
        $actualizarProducto = $request->all();
        $producto = $this->repoProducto->updated($id, $actualizarProducto);
        return redirect()->action('ProductoController@index');
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
        $nombre = Input::get('nombre');
        $modelo = Input::get('modelo');
        $categoria = Input::get('categoria');
//        if(empty($dato)==true){
//            return redirect()->action('ProductoController@index');
//        }

        $productos = $this->repoProducto->busquedaProducto($nombre,$serie,$categoria,$modelo);
//        dd($productos);
        return View('inventario.productos.productos', compact('productos'));


    }
}
