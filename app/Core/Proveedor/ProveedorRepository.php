<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 8:30
 */

namespace App\Core\Proveedor;


use App\Core\Contracts\BaseRepositoryInterface;

class ProveedorRepository implements BaseRepositoryInterface
{

    protected $proveedor;

    public function __construct()
    {
        $this->proveedor = new Proveedor();
    }

    public function all()
    {
       return $this->proveedor
                   ->orderBy('id', 'desc')
                   ->where('estado',1)
                   ->paginate(5);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function updated($id, array $attributes)
    {
        $registro = Proveedor::find($id);
        $registro->nro_documento = $attributes['nro_documento'];
        $registro->nombre = $attributes['nombre'];
        $registro->encargado = $attributes['encargado'];
        $registro->telefono = $attributes['telefono'];
        $registro->correo = $attributes['correo'];
        $registro->direccion = $attributes['direccion'];
        $registro->estado = $attributes['estado'];
        $registro->save();
    }

    public function find($id)
    {
        $registro = Proveedor::findOrFail($id);
        return  $registro;
    }

    public function deleted($id)
    {
        $registro = Proveedor::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    public function nuevoProveedor($datos){
        $registro = new Proveedor();
        $registro->ubigeo_id = $datos['distrito'];
        $registro->nro_documento = $datos['nro_documento'];
        $registro->nombre = $datos['nombre'];
        $registro->encargado = $datos['encargado'];
        $registro->telefono = $datos['telefono'];
        $registro->correo = $datos['correo'];
        $registro->direccion = $datos['direccion'];
        $registro->estado = $datos['estado'];
        $registro->save();
    }

    public function buscarProveedor($dato,$estado){
        return $this->proveedor->select()
            ->whereRaw("estado = '" .$estado. "' OR  nro_documento = '" .$dato . "' OR nombre LIKE '" .$dato . "' ")
            ->orderBy('id', 'desc')
            ->paginate(4);
    }
}