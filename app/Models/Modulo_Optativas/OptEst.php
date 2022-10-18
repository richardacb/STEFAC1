<?php

namespace App\Models\Modulo_Optativas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptEst extends Model
{
    use HasFactory;
    protected $table = 'opt_ests';
    protected $fillable = ['id_opt','id_est','estado_id','nota','matriculado_por_id'];
}