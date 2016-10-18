<?php

namespace App\Http\Controllers;

use App\Core\Proveedor\ProveedorRepository;
use App\Core\Ubigeo\UbigeoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProveedorController extends Controller
{
    protected $repoProveedor;
    protected $repoUbigeo;

    public function __construct(){
        $this->repoProveedor= new ProveedorRepository();
        $this->repoUbigeo = new UbigeoRepository();
    }

    public function index()
    {
        $proveedores = $this->repoProveedor->all();
        return view('compra.proveedor.listaproveedor', compact('proveedores'));
    }

    public function nuevoProveedor(){
        $departamentos = $this->repoUbigeo->allDepartamentos();
        return view('compra.proveedor.registrarproveedor', compact('departamentos'));
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
        $numubigeo = $this->repoUbigeo->buscarNumubigeo($proveedor["ubigeo_id"]);
        $departamento_id = $this->repoUbigeo->buscarUnDepartamento(substr($numubigeo[0]["numubigeo"],0,2))->toArray();
        $provincia_id = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,4))->toArray();
        $distrito_id = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,6))->toArray();


        $departamentos = $this->repoUbigeo->allDepartamentos();
        $provincias = $this->repoUbigeo->allProvincias(substr($numubigeo[0]["numubigeo"],0,2));
        $distritos = $this->repoUbigeo->allDistritos(substr($numubigeo[0]["numubigeo"],0,4));
        return view('compra.proveedor.editarproveedor', compact('proveedor','departamentos','provincias','distritos','departamento_id','provincia_id','distrito_id'));
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
    public function eliminarProveedor()
    {
        $id_producto = Input::get('id');
        $id = json_decode(json_encode($id_producto));
        $eliminarRegistro = $this->repoProveedor->deleted($id);
        return response()->json();
    }

    public function buscarProveedor(){
        $dato = Input::get('cliente');
        $estado = Input::get('estado');
        $proveedores = $this->repoProveedor->buscarProveedor($dato,$estado);
        return view('compra.proveedor.listaproveedor', compact('proveedores'));
    }


    public function destroy($id)
    {
        //
    }
}
