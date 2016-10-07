<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:23
 */

namespace App\Core\Categoria;
use App\Core\Contracts\BaseRepositoryInterface;

class CategoriaRepository implements BaseRepositoryInterface {

    protected $categoria;

    public function __construct(){
        $this->categoria = new Categoria();
    }

    public function all()
    {
        return $this->categoria
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public function allEnProducto(){
        return $this->categoria
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
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


    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }
// añadir nueva categoria
    public function nuevaCategoria($inputs){
        $categoria = new Categoria();
        $categoria->descripcion = $inputs['descripcion_categoria'];
        $categoria->estado = $inputs['estado'];
        $categoria->save();
    }
//    busqueda para editar categoria
    public function editarCategoria($id){
        $categoria = Categoria::findOrFail($id);
        return $categoria;
    }
//    actualizar categoria
    public function actualizarCategoria($datos){
        $categoria = Categoria::find($datos['categoria_id']);
        $categoria->descripcion = $datos['descripcion_categoria'];
        $categoria->estado = $datos['estado'];
        $categoria->save();

    }
//    eliminar categoria: cambiar de estado
    public function eliminarCatego($id){
        $categoria = Categoria::find($id);
        $categoria->estado = 0;
        $categoria->save();
    }
//    busqueda categoria
    public function busquedaCategoria($descripcion,$estado){
        return $this->categoria->select()
//            ->whereRaw("estado = '" .$estado. "'OR descripcion = '" .$descripcion . "'")
//            ->orderBy('id', 'desc')
            ->where('estado',$estado )
            ->orwhere('descripcion',$descripcion )
            ->paginate(4);
    }
}