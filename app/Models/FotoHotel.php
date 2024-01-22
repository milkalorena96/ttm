<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoHotel extends Model
{
    use HasFactory;
    protected $table = 'foto_hoteles';
    protected $fillable = ['ruta', 'id_hotel'];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'id_hotel');
    }
}
