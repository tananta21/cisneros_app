<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function modelo()
    {
        return $this->hasMany('App\Core\Modelo\Modelo');
    }
}
