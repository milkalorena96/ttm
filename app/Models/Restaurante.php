<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $table = 'restaurantes';
    protected $fillable = ['description','visitas','slug',
        'ruc','razonsocial','nombre', 'estado','ubicacion','departamento','provincia','distrito', 'imagen', 'descripcion','id_lugar'];

    public function lugar()
    {
        return $this->belongsTo('App\Models\Lugar_Turistico', 'id_lugar');
    }
    public function fotos()
    {
        return $this->hasMany('App\Models\FotoRestaurante', 'id_restuarante');
    }
}
