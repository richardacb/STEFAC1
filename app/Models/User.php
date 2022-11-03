<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Diagnosticopreventivo;
use App\Models\Modulo_Actividades\Evidencias;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'ci',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'tipo_de_usuario',
        'username',
        'password',
        'email',
        'sexo',
        'anno',
        'municipio',
        'provincia',
        'color_piel',
        'telefono_casa',
        'telefono_uci',
        'celular',
        'solapin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function estudiantes()
    {
        return $this->hasOne(Estudiantes::class);
    }
    public function profesores()
    {
        return $this->hasOne(Profesores::class);
    }
    public function diagnosticopreventivo()
    {
        return $this->hasOne(Diagnosticopreventivo::class);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


     /**
    * Get all of the usuario for the Evidencia
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function evidencia()
    {
        return $this->hasMany(Evidencias::class, 'id');
    }

}
