<?php

namespace App\Http\Controllers;

use App\Core\Proveedor\ProveedorRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProveedorController extends Controller
{
    protected $repoProveedor;

    public function __construct(){
        $this->repoProveedor= new ProveedorRepository();
    }

    public function index()
    {
        $proveedores = $this->repoProveedor->all();
        return view('compra.proveedor.listaproveedor', compact('proveedores'));
    }

    public function create()
    {
       $datos = Input::all();
       $nuevoProveedor= $this->repoProveedor->nuevoProveedor($datos);
        return redirect()->action('ProveedorController@index');
    }

    public function edit($id)
    {
        $proveedor = $this->repoProveedor->find($id);
        return view('compra.proveedor.editarproveedor', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $actualizarRegistro = $this->repoProveedor->updated($id, $datos);
        return redirect()->action('ProveedorController@index');
    }

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

    public function buscarProveedor(){
        $dato = Input::get('cliente');
        $proveedores = $this->repoProveedor->buscarProveedor($dato);
        return view('compra.proveedor.listaproveedor', compact('proveedores'));
    }


    public function destroy($id)
    {
        //
    }
}
