<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 19:18
 */

namespace App\Core\DetalleVenta;
use App\Core\Contracts\BaseRepositoryInterface;

class DetalleVentaRepository implements BaseRepositoryInterface {

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

    public function addDetalleVenta($nro_venta,$id, $price, $qy)
    {
        $venta = new DetalleVenta();
        $venta->venta_id = $nro_venta;
        $venta->producto_id = $id;
        $venta->precio = $price;
        $venta->cantidad = $qy;
        $venta->save();

    }
}