<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar_Turistico extends Model
{
    use HasFactory;
    protected $table = 'lugares_turisticos';
    protected $fillable = [
        'mapa',
        'description',
        'titulo',
        'ubicacion',
        'departamento',
        'provincia',
        'distrito',
        'nombre',
        'imagen',
        'descripcion',
        'categoria_id'
    ];
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }
    public function hoteles()
    {
        return $this->hasMany('App\Models\Hotel');
    }
    public function fotos()
    {
        return $this->hasMany('App\Models\FotoLugar', 'id_lugar');
    }
}
