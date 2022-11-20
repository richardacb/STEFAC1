<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    use HasFactory; 
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    protected $table = 'comites';
    protected $fillable = ['nombre'];
    
    //Relacion uno a muchos
    public function reportes()
    {
      return $this->hasMany('App\Models\Modulo_GECE\Reporte');
    }
}
