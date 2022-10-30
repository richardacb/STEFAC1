<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parciales extends Model
{
    use HasFactory;
    protected $table = 'pruebasparciales';
    protected $fillable = ['asignaturas_id','anno','semestre','dia','turno'];
}