<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hoteles';
    protected $fillable = ['nombre','description','visitas','slug',
        'ruc','razonsocial', 'estado','ubicacion','departamento','provincia','distrito', 'imagen', 'descripcion','id_lugar'];

    public function lugar()
    {
        return $this->belongsTo('App\Models\Lugar_Turistico', 'id_lugar');
    }
    public function fotos()
    {
        return $this->hasMany('App\Models\FotoHotel', 'id_hotel');
    }
}