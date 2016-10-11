<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/10/2016
 * Time: 22:00
 */

namespace App\Core\Cliente;


use App\Core\Contracts\BaseRepositoryInterface;

class ClienteRepository implements BaseRepositoryInterface{

    protected $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }


    public function all()
    {
        return $this->cliente->orderBy('id', 'desc')->paginate(4);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

    }

    public function find($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente;
    }

    public function updated($id, array $attributes)
    {
        // TODO: Implement updated() method.
    }

    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }

    public function registrarCliente($datos){
        $cliente = new Cliente();
        $cliente->tipo_cliente_id = $datos['tipo_cliente'];
        $cliente->nro_documento = $datos['nro_documento'];
        $cliente->nombres = $datos['nombres'];
        $cliente->apellidos = $datos['apellidos'];
        $cliente->telefono = $datos['telefono'];
        $cliente->correo = $datos['correo'];
        $cliente->direccion = $datos['direccion'];
        $cliente->estado_civil_id = $datos['estado_civil'];
        $cliente->grado_instruccion_id = $datos['grado_instruccion'];
        $cliente->ocupacion_id = $datos['ocupacion'];
        $cliente->fecha_nacimiento = $datos['fecha_nacimiento'];
        $cliente->estado = 1;
        $cliente->save();
    }

    //    busqueda categoria
    public function buscarCliente($dato){
        return $this->cliente->select()
            ->where('nro_documento',$dato)
            ->orWhere('nombres','LIKE',"%$dato%")
            ->orderBy('id', 'desc')
            ->paginate(4);
    }
}