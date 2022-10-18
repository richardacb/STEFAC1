<?php

namespace App\Models\Modulo_Optativas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optativa extends Model
{
    use HasFactory;
    protected $table = 'optativas';
    protected $fillable = ['nombre','descripcion','prof_principal','prof_auxiliar','capacidad','anno_academico','semestre','estado'];
}