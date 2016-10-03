<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:26
 */

namespace App\Core\GradoInstruccion;

use App\Core\Contracts\BaseRepositoryInterface;

class GradoInstruccionRepository implements BaseRepositoryInterface
{


    protected $gradoinstruccion;

    public function __construct()
    {
        $this->gradoinstruccion = new GradoInstruccion();
    }

    public function all()
    {
        return $this->gradoinstruccion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnProducto()
    {
        return $this->gradoinstruccion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearGradoInstruccion($inputs)
    {
        $registro = new GradoInstruccion();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarGradoInstruccion($id)
    {
        $registro = GradoInstruccion::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarGradoInstruccion($datos)
    {
        $registro = GradoInstruccion::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarGradoInstruccion($id)
    {
        $registro = GradoInstruccion::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarGradoInstruccion($estado)
    {
        return $this->gradoinstruccion->select()
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