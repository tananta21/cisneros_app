<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:29
 */

namespace App\Core\TipoEmpleado;


use App\Core\Contracts\BaseRepositoryInterface;



class TipoEmpleadoRepository implements BaseRepositoryInterface {

    protected $tipoEmpleado;

    public function __construct(){
        $this->tipoEmpleado = new TipoEmpleado();
    }

    public function all()
    {
        return $this->tipoEmpleado
            ->where('estado','1')
            ->orderBy('id', 'desc')
            ->get();
    }
    public function allEnVista(){
        return $this->tipoEmpleado
            ->where('estado','1')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function selectDescripcion($id){
        return $this->tipoEmpleado->select('descripcion')
            ->where('id',$id)
            ->get();
    }

    public function listaSelect(){
        return \DB::table('tipo_empleados')->lists('descripcion', 'id');
    }
    // añadir nuevo registro
    public function nuevoTipoEmpleado($inputs){
        $registro = new TipoEmpleado();
        $registro->descripcion = $inputs['descripcion_tipo'];
        $registro->estado = $inputs['estado'];
        $registro->save();
    }

//    busqueda para editar marca
    public function editarTipoEmpleado($id){
        $registro = TipoEmpleado::findOrFail($id);
        return $registro;
    }

//    actualizar categoria
    public function actualizarTipoEmpleado($datos){
        $registro =TipoEmpleado::find($datos['marca_id']);
        $registro->descripcion = $datos['descripcion_marca'];
        $registro->estado = $datos['estado'];
        $registro->save();

    }

    //    eliminar cambiar de estado
    public function eliminarTipoEmpleado($id){
        $registro = TipoEmpleado::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    //    busqueda marca
    public function buscarTipoEmpleado($estado){
        return $this->tipoEmpleado->select()
//            ->whereRaw("estado = '" .$estado. "'OR descripcion = '" .$descripcion . "'")
//            ->orderBy('id', 'desc')
            ->where('estado',$estado )
            ->orderBy('id', 'desc')
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
}