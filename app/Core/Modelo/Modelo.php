<?php

namespace App\Core\Modelo;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelos';

    public function producto()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
    public function marca()
    {
        return $this->belongsTo('App\Core\Marca\Marca');
    }


}
