<?php

namespace App\Core\TipoEmpleado;

use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    public function empleado()
    {
        return $this->hasMany('App\Core\Empleado\Empleado');
    }
}
