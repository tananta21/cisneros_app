<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:26
 */

namespace App\Core\Marca;

use App\Core\Contracts\BaseRepositoryInterface;

class MarcaRepository implements BaseRepositoryInterface {

    protected $marca;
    public function __construct(){
        $this->marca = new Marca();
    }

    public function all()
    {
        return $this->marca
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public function allEnProducto(){
        return $this->marca
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }

// añadir nueva marca
    public function nuevaMarca($inputs){
        $categoria = new Marca();
        $categoria->descripcion = $inputs['descripcion_marca'];
        $categoria->estado = $inputs['estado'];
        $categoria->save();
    }

//    busqueda para editar marca
    public function editarMarca($id){
        $marca = Marca::findOrFail($id);
        return $marca;
    }

//    actualizar categoria
    public function actualizarMarca($datos){
        $categoria = Marca::find($datos['marca_id']);
        $categoria->descripcion = $datos['descripcion_marca'];
        $categoria->estado = $datos['estado'];
        $categoria->save();

    }

 //    eliminar marca: cambiar de estado
    public function eliminarMarca($id){
        $categoria = Marca::find($id);
        $categoria->estado = 0;
        $categoria->save();
    }

    //    busqueda marca
    public function busquedaMarca($descripcion,$estado){
        return $this->marca->select()
//            ->whereRaw("estado = '" .$estado. "'OR descripcion = '" .$descripcion . "'")
//            ->orderBy('id', 'desc')
            ->where('estado',$estado )
            ->orwhere('descripcion',$descripcion )
            ->orderBy('id', 'desc')
            ->paginate(4);
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

    public function addMarca($inputs){
        $modelo = new Marca();
        $modelo->descripcion = $inputs['descripcion_marca'];
        $modelo->save();
    }

    public function ultimaMarca(){
        return Marca::all('id','descripcion')->last();
    }
}