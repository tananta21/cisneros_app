<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:23
 */

namespace App\Core\Categoria;
use App\Core\Contracts\BaseRepositoryInterface;

class CategoriaRepository implements BaseRepositoryInterface {

    public function all()
    {
        // TODO: Implement all() method.
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
}