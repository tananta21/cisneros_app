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
        // TODO: Implement updated() method.
    }

    public function find($id)
    {
        $registro = Empleado::findOrFail($id);
        return $registro;
    }

    public function deleted($id)
    {
        // TODO: Implement deleted() method.
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
        $registro->estado =1;
        $registro->save();
    }
}