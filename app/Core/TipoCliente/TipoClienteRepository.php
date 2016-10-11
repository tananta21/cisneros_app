<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 03/10/2016
 * Time: 1:23
 */

namespace App\Core\TipoCliente;

use App\Core\Contracts\BaseRepositoryInterface;

class TipoClienteRepository implements BaseRepositoryInterface
{
    protected $tipoCliente;

    public function __construct(){
        $this->tipoCliente = new TipoCliente();
    }

    public function all()
    {
        return $this->tipoCliente
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->paginate(5);
    }
    public function allEnVista(){
        return $this->tipoCliente
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }

    // añadir nuevo registro
    public function crearTipoCliente($inputs){
        $registro = new TipoCliente();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoCliente($id){
        $registro = TipoCliente::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoCliente($datos){
        $registro =TipoCliente::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoCliente($id){
        $registro = TipoCliente::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda
    public function buscarTipoCliente($estado){
        return $this->tipoCliente->select()
            ->where('estado',$estado )
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

}