<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categorias';
    protected $fillable = [
        'slug',
        'titulo',
        'description',
        'nombre',
        'descripcion',
        'urlfoto',
        'visitas',
        'orden',
    ];

    public function lugar()
    {
        return $this->hasMany('App\Models\Lugar_Turistico', 'categoria_id');
    }

    public function Post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
