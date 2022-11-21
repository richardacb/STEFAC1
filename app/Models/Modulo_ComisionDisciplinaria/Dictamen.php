<?php

namespace App\Models\Modulo_ComisionDisciplinaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Dictamen extends Model
{
    use HasFactory;
    protected $table = 'dictamen';
    protected $fillable = ['id','id_expediente', 'hechos','atenuantes','agravantes','resultadosexpacd','tipofalta','medida','created_at','updated_at'];
}