<?php

namespace App\Core\TipoProducto;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_productos';

    public function producto()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
