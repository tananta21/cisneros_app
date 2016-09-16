<?php

namespace App\Core\Categoria;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function producto()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
