<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 22:27
 */

namespace App\Core\DetalleCompra;
use App\Core\Contracts\BaseRepositoryInterface;

class DetalleCompraRepository implements BaseRepositoryInterface{


    public function all()
    {
        // TODO: Implement all() method.
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function updated($id, array $attributes)
    {
        // TODO: Implement updated() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }

    public function addDetalleCompra($nro_compra,$id, $price, $qy)
    {
        $venta = new DetalleCompra();
        $venta->compra_id = $nro_compra;
        $venta->producto_id = $id;
        $venta->precio = $price;
        $venta->cantidad = $qy;
        $venta->save();

    }
}