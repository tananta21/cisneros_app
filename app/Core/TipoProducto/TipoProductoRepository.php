<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:29
 */

namespace App\Core\TipoProducto;


use App\Core\Contracts\BaseRepositoryInterface;

class TipoProductoRepository implements BaseRepositoryInterface {

    protected $tipoProducto;

    public function __construct(){
        $this->tipoProducto = new TipoProducto();
    }

    public function all()
    {
        return $this->tipoProducto
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public function allEnProducto(){
        return $this->tipoProducto
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function nuevoTipoProducto($inputs){
        $registro = new TipoProducto();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoProducto($id){
        $registro = TipoProducto::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoProducto($datos){
        $registro =TipoProducto::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoProducto($id){
        $registro = TipoProducto::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoProducto($estado){
        return $this->tipoProducto->select()
//            ->whereRaw("estado = '" .$estado. "'OR descripcion = '" .$descripcion . "'")
//            ->orderBy('id', 'desc')
            ->where('estado',$estado )
            ->orderBy('id', 'desc')
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