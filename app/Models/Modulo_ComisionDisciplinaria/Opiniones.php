<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Opiniones extends Model
{
    use HasFactory;
    protected $table = 'opiniones';
    protected $fillable = ['id','Nombre', 'responsabilidad','descripcion','id_expediente','created_at','updated_at'];
}