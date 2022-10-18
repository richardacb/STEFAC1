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
        'tipos_de_problemas'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}