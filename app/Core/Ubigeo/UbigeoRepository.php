<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 11/10/2016
 * Time: 4:36
 */

namespace App\Core\Ubigeo;
use App\Core\Contracts\BaseRepositoryInterface;

class UbigeoRepository implements BaseRepositoryInterface {

    protected $ubigeo;

    public function __construct(){
        $this->ubigeo = new Ubigeo();
    }
    public function all()
    {
        return $this->ubigeo->paginate(7);
    }

    public function buscarUbigeo($dato){
        return $this->ubigeo->select()
            ->where('numubigeo','LIKE',"$dato%" )
            ->orderBy('numubigeo', 'asc')
            ->paginate(7);
    }

    public function allDepartamentos(){
        return $this->ubigeo->select('numubigeo','departamento')
            ->whereRaw("provincia = '' AND distrito = ''")
            ->get();
    }

    public function allProvincias($ubigeo){
        return $this->ubigeo->select('numubigeo','provincia','id')
            ->whereRaw("numubigeo LIKE '" .$ubigeo. "%'  AND distrito = ''")
            ->get();
    }

    public function allDistritos($ubigeo){
        return $this->ubigeo->select('numubigeo','provincia','distrito','id')
            ->whereRaw("numubigeo LIKE '" .$ubigeo. "%'")
            ->get();
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
        // TODO: Implement find() method.
    }

    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }


}