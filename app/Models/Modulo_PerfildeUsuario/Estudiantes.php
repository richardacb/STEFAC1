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
    
    public function grupos()
    {
        return $this->belongsTo(Grupos::class, 'grupos_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comite()
    {
        return $this->belongsTo('App\Models\Modulo_GECE\Comite');
    }

    public function tribunaltaller()
    {
        return $this->belongsTo('App\Models\Modulo_GECE\TribunalTaller');
    }

    public function tribunalpd()
    {
        return $this->belongsTo('App\Models\Modulo_GECE\TribunalPD');
    }

    public function tema()
    {
        return $this->belongsTo('App\Models\Modulo_GECE\Tema');
    }

    public function perfil()
    {
        return $this->belongsTo('App\Models\Modulo_GECE\Perfil');
    }
}
