<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'nombre_hash', 'mime'];

    public function deposito(){
        return $this->belongsTo(Deposito::class);
    }
}
