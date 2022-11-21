<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision_Disciplinaria extends Model
{
    use HasFactory;
    protected $table = 'comision__disciplinarias';
    protected $fillable = ['Nombre_comision','Presidente','Miembro','miemb','created_at'];
}
