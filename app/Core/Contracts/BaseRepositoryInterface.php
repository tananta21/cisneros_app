<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/06/2016
 * Time: 15:37
 */
namespace App\Core\Contracts;

interface BaseRepositoryInterface {

    public function all();
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updated($id, array $attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id);
}