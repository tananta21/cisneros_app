<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:28
 */

namespace App\Core\Producto;
use App\Core\Contracts\BaseRepositoryInterface;

class ProductoRepository implements BaseRepositoryInterface {

    protected $producto;
    public function __construct(){
        $this->producto = new Producto();
    }

    public function all()
    {
       return  $this->producto->paginate(5);
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

    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        $this->producto->destroy($id);
    }


}