<?php

namespace App\Models\Modulo_PerfildeUsuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\User;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $fillable = [
        'user_id',
        'grupos_id',
        'periodo_lectivo',
        'tipo_curso',
        'plan_estudio',
        'organizacion_pe',
        'via_ingreso',
        'situacion_escolar',
        'situacion_militar',
        'cohorte_estudiantil',
        'centro_trabajo',
        'discapacidad',
        'tipo_estudiante',
        'direccion_completa',
        'nombre_madre',
        'organizacion_politica',
        'opcion_uci',
    ];
    /**
     * Get the grupos that owns the Estudiantes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupos()
    {
        return $this->belongsTo(Grupos::class, 'grupos_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
