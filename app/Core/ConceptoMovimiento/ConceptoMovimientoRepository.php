<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 2:36
 */

namespace App\Core\ConceptoMovimiento;


use App\Core\Contracts\BaseRepositoryInterface;

class ConceptoMovimientoRepository implements BaseRepositoryInterface {

    protected $conceptomovimiento;

    public function __construct()
    {
        $this->conceptomovimiento = new ConceptoMovimiento();
    }

    public function all()
    {
        return $this->conceptomovimiento
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnProducto()
    {
        return $this->conceptomovimiento
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearConceptoMovimiento($inputs)
    {
        $registro = new ConceptoMovimiento();
        $registro->tipo_movimiento_id = $inputs['tipo_movimiento'];
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarConceptoMovimiento($id)
    {
        $registro = ConceptoMovimiento::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarConceptoMovimiento($datos)
    {
        $registro = ConceptoMovimiento::find($datos['marca_id']);
        $registro->tipo_movimiento_id = $datos['tipo_movimiento'];
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarConceptoMovimiento($id)
    {
        $registro = ConceptoMovimiento::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarConceptoMovimiento($estado,$descripcion,$tipo_movimiento)
    {
        return $this->conceptomovimiento->select()
            ->whereRaw("estado = '" .$estado. "'
                        OR descripcion = '" .$descripcion . "'
                        OR tipo_movimiento_id = '" .$tipo_movimiento . "'
                        ")
            ->orderBy('id', 'desc')
//            ->where('estado',$estado )
//            ->orwhere('descripcion',$descripcion )
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