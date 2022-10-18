<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afectaciones extends Model
{
    use HasFactory;
    protected $table = 'afectaciones';
    protected $fillable = ['profesores_afectados_id','profesores_suplentes_id','semana','dia'];
}