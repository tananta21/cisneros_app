<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:26
 */

namespace App\Core\Marca;


use App\Core\Contracts\BaseRepositoryInterface;

class MarcaRepository implements BaseRepositoryInterface {

    public function all()
    {
        return Marca::all();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
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

    public function addMarca($inputs){
        $modelo = new Marca();
        $modelo->descripcion = $inputs['descripcion_marca'];
        $modelo->save();
    }
}