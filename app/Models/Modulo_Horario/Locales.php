<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locales extends Model
{
    use HasFactory;
    protected $table = 'locales';
    protected $fillable = ['tipo_de_locales_id','local','disponibilidad'];
}
