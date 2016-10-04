<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 2:14
 */

namespace App\Core\TipoTransaccion;


use App\Core\Contracts\BaseRepositoryInterface;

class TipoTransaccionRepository implements BaseRepositoryInterface {

    protected $tipotransaccion;

    public function __construct()
    {
        $this->tipotransaccion = new TipoTransaccion();
    }

    public function all()
    {
        return $this->tipotransaccion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnProducto()
    {
        return $this->tipotransaccion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearTipoTransaccion($inputs)
    {
        $registro = new TipoTransaccion();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoTransaccion($id)
    {
        $registro = TipoTransaccion::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoTransaccion($datos)
    {
        $registro = TipoTransaccion::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoTransaccion($id)
    {
        $registro = TipoTransaccion::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoTransaccion($estado)
    {
        return $this->tipotransaccion->select()
            ->where('estado', $estado)
            ->paginate(4);
    }


    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updated($id, array $attributes)
    {
        // TODO: Implement updated() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }
}