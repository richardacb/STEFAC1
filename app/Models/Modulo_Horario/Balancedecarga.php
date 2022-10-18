<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToCollection;

class Balancedecarga extends Model
{
    use HasFactory;
    protected $table = 'balance_de_carga';
    protected $fillable = ['asignaturas_id','frecuencia','tipo_clase','semana'];


}
