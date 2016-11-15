<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 19:14
 */

namespace App\Core\Venta;


use App\Core\Contracts\BaseRepositoryInterface;

class VentaRepository implements BaseRepositoryInterface{

    protected $venta;

    public function __construct(){
        $this->venta = new Venta();
    }

    public function all()
    {
        return Venta::all('id')->last();
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
    public function addVenta($cliente, $empleado,$comprobante,$transaccion){
        $venta = new Venta();
        $venta->cliente_id = $cliente;
        $venta->empleado_id = $empleado;
        $venta->tipo_comprobante_id = $comprobante;
        $venta->tipo_transaccion_id = $transaccion;
        $venta->save();
    }

    public function totalVentaCliente($id){
        return Venta::select()->where("cliente_id",$id)->count();

    }
}