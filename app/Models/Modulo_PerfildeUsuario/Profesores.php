<?php

namespace App\Models\Modulo_PerfildeUsuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\User;

class Profesores extends Model
{
    use HasFactory;
    protected $table = 'profesores';
    protected $fillable = [
        'user_id',
        'grupos_id',
        'periodo_lectivo',
        'tipo_de_clases',
        'asignaturas_id',
    ];
    /**
     * The grupos that belong to the Profesores
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
