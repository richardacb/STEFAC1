<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    use HasFactory; 
    static $rules = [
		'nombre' => 'required',
    'estudiante_id' => 'required',
    'profesor_id' => 'required',
    'estudiante2',
    'secretario' => 'required',
    'presidente' => 'required',
    ];

    protected $perPage = 20;

    protected $table = 'comites';
    protected $fillable = ['nombre', 'estudiante_id', 'profesor_id', 'estudiante2', 'secretario', 'presidente'];
    
    //Relacion uno a muchos
    public function reportes()
    {
      return $this->hasMany('App\Models\Modulo_GECE\Reporte');
    }

    public function estudiantes()
    {
      return $this->hasMany('App\Models\Modulo_PerfildeUsuario\Estudiantes', 'estudiante_id', 'id');
    }

    public function profesores()
    {
      return $this->hasMany('App\Models\Modulo_PerfildeUsuario\Profesores', 'profesor_id', 'id');
    }
}
