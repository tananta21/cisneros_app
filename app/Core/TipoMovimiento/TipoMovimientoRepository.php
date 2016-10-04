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