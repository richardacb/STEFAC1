<?php

namespace App\Models\Modulo_Horario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    use HasFactory;
    protected $table = 'secciones';
    protected $fillable = ['nombre'];
}
