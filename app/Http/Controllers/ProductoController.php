<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Core\Producto\ProductoRepository;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    protected $repoProducto;

    public function __construct(){
        $this->repoProducto = new ProductoRepository();
    }

    public function index()
    {

        $productos = $this->repoProducto->all();
//        dd($productos->toArray());
        return View('inventario.productos.productos',compact('productos'));
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


    public function destroy($id)
    {
        $eliminarProducto = $this->repoProducto->deleted($id);
        return redirect()->action('ProductoController@index');
    }

    public function eliminarProducto(){
        $id_producto = Input::get('idproducto');
        $id= json_decode(json_encode($id_producto));
        $eliminarProducto = $this->repoProducto->deleted($id);
        return response()->json();
    }
}
