<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    static $rules = [  
      'nombre' => 'required',
      
    ];
    protected $perPage = 20;

    protected $table = 'temas';
    protected $fillable = ['nombre'];
 
}
