<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 22:26
 */

namespace App\Core\Compra;


use App\Core\Contracts\BaseRepositoryInterface;

class CompraRepository implements BaseRepositoryInterface {

    protected $compra;

    public function __construct(){
        $this->compra = new Compra();
    }
    public function all()
    {
        return Compra::all('id')->last();
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

    public function addCompra($cliente, $empleado,$comprobante,$transaccion){
        $venta = new Compra();
        $venta->proveedor_id = $cliente;
        $venta->empleado_id = $empleado;
        $venta->tipo_comprobante_id = $comprobante;
        $venta->tipo_transaccion_id = $transaccion;
        $venta->save();
    }
}