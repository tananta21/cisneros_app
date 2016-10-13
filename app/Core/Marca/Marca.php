<?php

namespace App\Core\Marca;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    public function producto()
    {
        return $this->hasMany('App\Core\Modelo\Modelo');
    }
}
