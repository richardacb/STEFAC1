<?php

namespace App\Models\Modulo_PerfildeUsuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoProfesor extends Model
{
    use HasFactory;
    protected $table = 'grupo_profesor';
    protected $fillable = [
        'grupos_id',
        'profesores_id'
    ];
}
