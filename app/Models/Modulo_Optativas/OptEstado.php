<?php

namespace App\Models\Modulo_Optativas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptEstado extends Model
{
    use HasFactory;
    protected $table = 'opt_estados';
    protected $fillable = ['estado'];
}