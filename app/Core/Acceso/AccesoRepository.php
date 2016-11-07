<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 23/10/2016
 * Time: 15:11
 */

namespace App\Core\Acceso;


use App\Core\Contracts\BaseRepositoryInterface;
use App\Core\Modulo\Modulo;

class AccesoRepository implements BaseRepositoryInterface {

    public function all()
    {

    }
    public function buscarModulos($tipo){
            $resultado =  \DB::select("CALL buscarModulo('" . $tipo . "')");
            return $resultado;
    }

    public function buscarSubmodulos($tipo){
        $resultado =  \DB::select("CALL buscarSubModulo('" . $tipo . "')");
        return $resultado;
    }

    public function actualizarAcceso($tipo ,$idmodulo ,$estado){

        $consulta = \DB::select("select * from accesos where tipo_empleado_id = '" . $tipo . "' AND modulo_id = '" . $idmodulo . "'");
//        dd($consulta[0]->id);
        if(empty($consulta)){
            $registro = new Acceso();
            $registro->tipo_empleado_id = $tipo;
            $registro->modulo_id = $idmodulo;
            $registro->estado = $estado;
            $registro->save();
        }
        else{
            $registro = Acceso::findOrFail($consulta[0]->id);
            $registro->estado = $estado;
            $registro->save();
        }
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