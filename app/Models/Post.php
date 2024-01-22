<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'titulo',
        'description',
        'nombre',
        'descripcion',
        'urlfoto',
        'visitas',
        'orden',
        'categoria_id'
    ];
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

}
