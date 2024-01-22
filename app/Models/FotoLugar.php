<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoLugar extends Model
{
    use HasFactory;
    protected $table = 'foto_lugares';
    protected $fillable = ['ruta', 'id_lugar'];

    public function lugar()
    {
        return $this->belongsTo('App\Models\Lugar_Turistico', 'id_lugar');
    }
}
