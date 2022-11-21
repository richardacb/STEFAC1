<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Declaraciones extends Model
{
    use HasFactory;
    protected $table = 'declaraciones';
    protected $fillable = ['id','Nombre_declarante', 'cargo','declaracion_hechos','id_expediente','created_at','updated_at'];
}