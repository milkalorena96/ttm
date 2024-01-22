<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoRestaurante extends Model
{
    use HasFactory;
    protected $table = 'foto_restaurantes';
    protected $fillable = ['ruta', 'id_restuarante'];

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante', 'id_restuarante');
    }
}
