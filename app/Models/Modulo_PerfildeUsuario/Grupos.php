<?php

namespace App\Models\Modulo_PerfildeUsuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Profesores;

class Grupos extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $fillable = [
        'name',
        'anno',
    ];
   /**
    * Get all of the estudiantes for the Grupos
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function estudiantes()
   {
       return $this->hasMany(Estudiantes::class, 'id');
   }

   /**
    * Get all of the profesores for the Grupos
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function profesores()
   {
       return $this->hasMany(Profesores::class, 'id');
   }
}