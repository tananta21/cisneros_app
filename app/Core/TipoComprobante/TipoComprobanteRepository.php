<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 2:08
 */

namespace App\Core\TipoComprobante;


use App\Core\Contracts\BaseRepositoryInterface;

class TipoComprobanteRepository implements BaseRepositoryInterface
{

    protected $tipocomprobante;

    public function __construct()
    {
        $this->tipocomprobante = new TipoComprobante();
    }

    public function all()
    {
        return $this->tipocomprobante
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnProducto()
    {
        return $this->tipocomprobante
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearTipoComprobante($inputs)
    {
        $registro = new TipoComprobante();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoComprobante($id)
    {
        $registro = TipoComprobante::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoComprobante($datos)
    {
        $registro = TipoComprobante::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoComprobante($id)
    {
        $registro = TipoComprobante::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoComprobante($estado)
    {
        return $this->tipocomprobante->select()
            ->where('estado', $estado)
            ->orderBy('id', 'desc')
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