<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'configuraciones';
    protected $fillable = [
        'titulo',
        'description',
        'urlfoto',
        'colorPrimario',
        'colorSecundario',
        'urlfavicon',
        'urllogo',
        'razonsocial',
        'direccion',
        'celular',
        'email',
        'facebook',
    ];
}