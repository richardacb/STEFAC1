<?php

namespace App\Models\Modulo_Optativas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstEstado extends Model
{
    use HasFactory;
    protected $table = 'est_estados';
    protected $fillable = ['estado'];
}