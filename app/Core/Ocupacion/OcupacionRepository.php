<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:27
 */

namespace App\Core\Ocupacion;

use App\Core\Contracts\BaseRepositoryInterface;

class OcupacionRepository implements BaseRepositoryInterface
{
    protected $ocupacion;

    public function __construct()
    {
        $this->ocupacion = new Ocupacion();
    }

    public function all()
    {
        return $this->ocupacion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }

    public function allEnVista()
    {
        return $this->ocupacion
            ->where('estado', '1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearOcupacion($inputs)
    {
        $registro = new Ocupacion();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarOcupacion($id)
    {
        $registro = Ocupacion::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarOcupacion($datos)
    {
        $registro = Ocupacion::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarOcupacion($id)
    {
        $registro = Ocupacion::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarOcupacion($estado)
    {
        return $this->ocupacion->select()
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