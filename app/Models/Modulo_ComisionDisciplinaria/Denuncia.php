<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;


class Denuncia extends Model
{
    use HasFactory;
    protected $table = 'denuncia';
    protected $fillable = ['id','id_comision','Nombre_denunciante','descripcion', 'Nombre_denunciado','estado','created_at'];
}

