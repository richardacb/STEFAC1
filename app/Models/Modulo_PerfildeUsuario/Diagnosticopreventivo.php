<?php

namespace App\Models\Modulo_PerfildeUsuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Diagnosticopreventivo extends Model
{
    use HasFactory;
    protected $table = 'diagnosticopreventivo';
    protected $fillable = [
        'user_id',
        'nacionalidad',
        'adicciones_Alcohol',
        'adicciones_Tabaco',
        'adicciones_Café',
        'adicciones_Tecnoadicciones',
        'adicciones_Drogas',
        'tipo_medicamentos',
        'tipo_medicamentos_consumo',
        'grupo_social',
        'creencia_religiosa',
        'prob_de_personalidad',
        'desc_prob_de_personalidad',
        'prob_de_psiquiatricos',
        'desc_prob_de_psiquiatricos',
        'prob_de_economicos',
        'desc_prob_de_economicos',
        'prob_de_sociales',
        'desc_prob_de_sociales',
        'prob_de_familiares',
        'desc_prob_de_familiares',
        'prob_de_academicos',
        'desc_prob_de_academicos',
        'prob_de_disciplina',
        'desc_prob_de_disciplina',
        'prob_de_asistencia',
        'desc_prob_de_asistencia',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}