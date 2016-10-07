<?php

namespace App\Core\TipoMovimiento;

use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    public function concepto()
    {
        return $this->hasMany('App\Core\ConceptoMovimiento\ConceptoMovimiento');
    }
}
