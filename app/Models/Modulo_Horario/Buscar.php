<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buscar extends Model
{
    use HasFactory;
    protected $table = 'asignaciones';
    protected $fillable = ['disponibilidad_id','planificacion_id','anno','semana'];
}