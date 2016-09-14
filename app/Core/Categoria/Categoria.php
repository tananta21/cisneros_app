<?php

namespace App\Core\Categoria;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function modelo()
    {
        return $this->hasMany('App\Core\Modelo\Modelo');
    }
}
