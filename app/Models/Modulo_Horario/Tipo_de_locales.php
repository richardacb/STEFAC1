<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_de_locales extends Model
{
    use HasFactory;
    protected $table = 'tipo_de_locales';
    protected $fillable = ['tipo'];
}
