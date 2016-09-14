<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function tipoProducto()
    {
        return $this->belongsTo('App\Core\TipoProducto\TipoProducto');
    }
    public function modelo()
    {
        return $this->belongsTo('App\Core\Modelo\Modelo');
    }

}
