<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 19/10/2016
 * Time: 10:46
 */

namespace App\Core\Modulo;
use App\Core\Contracts\BaseRepositoryInterface;

class ModuloRepository implements BaseRepositoryInterface {

    protected $modulo;

    public function __construct(){
        $this->modulo = new Modulo();
    }
    public function all()
    {
    }

    public function allModulos(){
        return $this->modulo
            ->select()
            ->where('id_padre',null)
            ->get();
    }

    public function allSubModulos(){
        return $this->modulo
            ->select()
            ->where('id_padre','!=','')
            ->get();
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function updated($id, array $attributes)
    {
        $registro = Modulo::find($id);
        $registro->descripcion = $attributes["descripcion_modulo"];
        $registro->estado = $attributes["estado"];
        $registro->save();
    }

    public function find($id)
    {
        $registro = Modulo::findOrFail($id);
        return $registro;
    }

    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }
}