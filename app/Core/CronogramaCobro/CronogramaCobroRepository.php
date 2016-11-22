<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 16/11/2016
 * Time: 16:47
 */

namespace App\Core\CronogramaCobro;


use App\Core\Contracts\BaseRepositoryInterface;
use Carbon\Carbon;

class CronogramaCobroRepository implements BaseRepositoryInterface{

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function registrarCronograma($nro_venta,$fecha_pago,$cuota, $monto_pago, $estado_pago){
        $time = strtotime($fecha_pago);
        $registro = new CronogramaCobro();
        $registro->venta_id = $nro_venta;
        $registro->fecha = date('Y-m-d',$time);
        $registro->cuota = $cuota;
        $registro->monto = $monto_pago;
        $registro->pagado = 0;
        $registro->estado = $estado_pago;
        $registro->save();
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

//    ELIMINAR CRONOGRAMA
    public function deleted($id)
    {
        $eliminar = \DB::select("DELETE FROM cronograma_cobros WHERE venta_id = '".$id."'");
    }
}