<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    public function producto()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Core\Categoria\Categoria');
    }

    public function marca()
    {
        return $this->belongsTo('App\Core\Marca\Marca');
    }


}
