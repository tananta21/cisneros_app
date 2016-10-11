<?php

namespace App\Core\Empleado;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    public function tipoEmpleado()
    {
        return $this->belongsTo('App\Core\TipoEmpleado\TipoEmpleado');
    }
}
