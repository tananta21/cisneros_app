<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 2:12
 */

namespace App\Core\TipoMovimiento;


use App\Core\Contracts\BaseRepositoryInterface;


class TipoMovimientoRepository implements BaseRepositoryInterface {

    protected $tipomovimiento;

    public function __construct()
    {
        $this->tipomovimiento = new TipoMovimiento();
    }

    public function all()
    {
        return $this->tipomovimiento
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnConcepto()
    {
        return $this->tipomovimiento
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearTipoMovimiento($inputs)
    {
        $registro = new TipoMovimiento();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoMovimiento($id)
    {
        $registro = TipoMovimiento::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoMovimiento($datos)
    {
        $registro = TipoMovimiento::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoMovimiento($id)
    {
        $registro = TipoMovimiento::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoMovimiento($estado)
    {
        return $this->tipomovimiento->select()
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