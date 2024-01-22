<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;
    protected $table = 'correos';
    protected $fillable = ['email', 'nombre', 'subject', 'mensaje'];
}