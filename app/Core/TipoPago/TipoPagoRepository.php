<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 2:11
 */

namespace App\Core\TipoPago;


use App\Core\Contracts\BaseRepositoryInterface;

class TipoPagoRepository implements BaseRepositoryInterface {

    protected $tipopago;

    public function __construct()
    {
        $this->tipopago = new TipoPago();
    }

    public function all()
    {
        return $this->tipopago
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnProducto()
    {
        return $this->tipopago
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearTipoPago($inputs)
    {
        $registro = new TipoPago();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoPago($id)
    {
        $registro = TipoPago::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoPago($datos)
    {
        $registro = TipoPago::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoPago($id)
    {
        $registro = TipoPago::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoPago($estado)
    {
        return $this->tipopago->select()
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