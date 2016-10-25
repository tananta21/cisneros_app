<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 23/10/2016
 * Time: 15:11
 */

namespace App\Core\Acceso;


use App\Core\Contracts\BaseRepositoryInterface;

class AccesoRepository implements BaseRepositoryInterface {

    public function all()
    {

    }
    public function buscarModulos($tipo){
       $resultado =  Acceso
            ::join('modulos', 'accesos.modulo_id', '=', 'modulos.id')
            ->select('modulos.descripcion','modulos.icono','modulos.id as id','accesos.estado as estado','accesos.id as id_acceso')
            ->whereRaw("tipo_empleado_id = '" . $tipo . "' and modulos.nivel = 1 ")
            ->get();
        return $resultado;
    }
    public function buscarSubmodulos($tipo){
        $resultado = Acceso
            ::join('modulos', 'accesos.modulo_id', '=', 'modulos.id')
            ->select('modulos.descripcion','modulos.id_padre as id_padre', 'modulos.url as url','accesos.estado as estado','accesos.id as id_acceso')
            ->whereRaw("tipo_empleado_id = '" . $tipo . "' AND modulos.id_padre != '' ")
            ->get();
            return $resultado;
    }

    public function actualizarAcceso($id,$estado){
        $acceso = Acceso::find($id);
        $acceso->estado = $estado;
        $acceso->save();
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
}