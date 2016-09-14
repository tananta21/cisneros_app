<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    public function producto()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
