<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Denunciado extends Model
{
    use HasFactory;
    protected $table = 'denunciado';
    protected $fillable = ['id','id_denuncia','Nombre_denunciado', 'created_at'];
}