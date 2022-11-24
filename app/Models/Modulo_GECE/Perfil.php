<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    static $rules = [  
        'nombre' => 'required',
        'estudiante1' => 'required',
        'estudiante2',
        'profesor1' => 'required',
        'profesor2',
      ];
      
      protected $perPage = 20;
  
      protected $table = 'perfil';
      protected $fillable = ['nombre', 'estudiante1', 'estudiante2', 'profesor1', 'profesor2'];

      public function estudiantes()
    {
      return $this->hasMany('App\Models\Modulo_PerfildeUsuario\Estudiantes', 'estudiante_id', 'id');
    }

    public function profesores()
    {
      return $this->hasMany('App\Models\Modulo_PerfildeUsuario\Profesores', 'profesor_id', 'id');
    }
}
