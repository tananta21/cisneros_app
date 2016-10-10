<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:25
 */

namespace App\Core\EstadoCivil;
use App\Core\Contracts\BaseRepositoryInterface;

class EstadoCivilRepository implements BaseRepositoryInterface {

    protected $estadocivil;

    public function __construct(){
        $this->estadocivil = new EstadoCivil();
    }

    public function all()
    {
        return $this->estadocivil
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public function allEnVista(){
        return $this->estadocivil
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearEstadoCivil($inputs){
        $registro = new EstadoCivil();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarEstadoCivil($id){
        $registro = EstadoCivil::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarEstadoCivil($datos){
        $registro =EstadoCivil::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarEstadoCivil($id){
        $registro = EstadoCivil::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda marca
    public function buscarEstadoCivil($estado){
        return $this->estadocivil->select()
            ->where('estado',$estado )
            ->paginate(4);
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