<?php

namespace App\Core\ConceptoMovimiento;

use Illuminate\Database\Eloquent\Model;

class ConceptoMovimiento extends Model
{
    public function tipoMovimiento()
    {
        return $this->belongsTo('App\Core\TipoMovimiento\TipoMovimiento');
    }
}
