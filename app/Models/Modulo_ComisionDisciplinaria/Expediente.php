<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;


class Expediente extends Model
{
    use HasFactory;
    protected $table = 'expediente';
    protected $fillable = ['id', 'id_denunciado','id_denuncia', 'created_at'];
}



