<?php

namespace App\Core\Producto;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = 'productos';

    public function tipoProducto()
    {
        return $this->belongsTo('App\Core\TipoProducto\TipoProducto');
    }
    public function modelo()
    {
        return $this->belongsTo('App\Core\Modelo\Modelo');
    }


    public function scopeSerie($query, $serie)
    {

        if (trim($serie) != "") {
            $query->where('serie', 'LIKE', "%$serie%");
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if (trim($nombre) != "") {
            $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }


    public function scopeModelo($query, $modelo){

        if (trim($modelo) != "") {
            $query->where('modelo_id', $modelo);
        }
    }


}
