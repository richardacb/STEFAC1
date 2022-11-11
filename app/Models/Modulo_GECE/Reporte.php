<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    static $rules = [  
      'nombre' => 'required',
      'comite_id' => 'required'
    ];
    protected $perPage = 20;

    protected $table = 'reportes';
    protected $fillable = ['nombre', 'comite_id'];
 
    //Relacion uno a muchos (inversa)
    public function comite()
    {
      return $this->belongsTo('App\Models\Modulo_GECE\Comite');
    }
}
