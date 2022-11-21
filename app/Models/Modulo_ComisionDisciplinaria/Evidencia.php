<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Evidencia extends Model
{
    use HasFactory;
    protected $table = 'evidencias';
    protected $fillable = ['id','Archivo','id_expediente','created_at','updated_at'];
}