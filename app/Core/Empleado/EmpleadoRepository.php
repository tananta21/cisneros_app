<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 10/10/2016
 * Time: 10:03
 */

namespace App\Core\Empleado;
use App\Core\Contracts\BaseRepositoryInterface;

class EmpleadoRepository implements BaseRepositoryInterface {

    protected $empleado;

    public function __construct(){
        $this->empleado = new Empleado();
    }

    public function all()
    {
       return $this->empleado->where('estado',1)->orderBy('id','desc')->paginate(5);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function updated($id, array $attributes)
    {
        $registro = Empleado::find($id);
        $registro->tipo_empleado_id = $attributes['tipo_empleado'];
        $registro->estado_civil_id = $attributes['estado_civil'];
        $registro->grado_instruccion_id = $attributes['grado_instruccion'];
        $registro->ocupacion_id = $attributes['ocupacion'];
        $registro->nro_documento = $attributes['nro_documento'];
        $registro->name = $attributes['nombres'];
        $registro->apellidos = $attributes['apellidos'];
        $registro->email = $attributes['correo'];
        $registro->telefono = $attributes['telefono'];
        $registro->estado =$attributes['estado'];
        $registro->save();
    }

    public function find($id)
    {
        $registro = Empleado::findOrFail($id);
        return $registro;
    }

    public function deleted($id)
    {
        $registro = Empleado::find($id);
        $registro->estado = 0;
        $registro->save();
    }
    public function nuevoEmpleado($datos){
        $registro = new Empleado();
        $registro->tipo_empleado_id = $datos['tipo_empleado'];
        $registro->estado_civil_id = $datos['estado_civil'];
        $registro->grado_instruccion_id = $datos['grado_instruccion'];
        $registro->ocupacion_id = $datos['ocupacion'];
        $registro->nro_documento = $datos['nro_documento'];
        $registro->name = $datos['nombre'];
        $registro->apellidos = $datos['apellido'];
        $registro->email = $datos['correo'];
        $registro->telefono = $datos['telefono'];
        $registro->estado =$datos['estado'];
        $registro->save();
    }

    public function buscarEmpleado($dato,$estado){
        return $this->empleado->select()
            ->whereRaw("estado = '" .$estado. "' OR nro_documento = '" .$dato . "' OR name LIKE '" .$dato . "' ")
            ->orderBy('id', 'desc')
            ->paginate(4);
    }
}