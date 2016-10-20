<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:27
 */

namespace App\Core\Modelo;


use App\Core\Contracts\BaseRepositoryInterface;

class ModeloRepository implements BaseRepositoryInterface {


    protected $marca;

    public function __construct(){
        $this->marca = new Modelo();
    }

    public function all()
    {
        return $this->marca
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }
    public function allEnProducto($marca){
        return $this->marca->select('id','descripcion')
            ->whereRaw("marca_id = '".$marca."' ")
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nueva marca
    public function nuevoModelo($inputs){
        $registro = new Modelo();
        $registro->marca_id = $inputs['marca_id'];
        $registro->descripcion = $inputs['descripcion_modelo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarModelo($id){
        $registro = Modelo::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarModelo($datos){
        $registro = Modelo::find($datos['marca_id']);
        $registro->marca_id = $datos['marca'];
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarModelo($id){
        $registro = Modelo::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda modelo
    public function busquedaModelo($descripcion,$estado){
        return $this->marca->select()
//            ->whereRaw("estado = '" .$estado. "'OR descripcion = '" .$descripcion . "'")
//            ->orderBy('id', 'desc')
            ->where('estado',$estado )
            ->orwhere('descripcion',$descripcion )
            ->orderBy('id', 'desc')
            ->get();
    }

//    seleccionar la marca de un modelo
    public function marcaDeModelo($id){
        return $this->marca->select('marca_id')
            ->where("id",$id)
            ->get();
    }
//    seleccionar todos los modelos que pertenescan al id

    public function modelosDeMarca($id_marca){
        return $this->marca->select()
            ->where("marca_id",$id_marca)
            ->get();
    }








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

    public function addModelo($inputs){
        $modelo = new Modelo();
        $modelo->descripcion = $inputs['descripcion_modelo'];
        $modelo->save();
    }
}