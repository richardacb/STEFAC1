<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;

    static $rules = [  
        'titulo' => 'required',
      ];
    protected $table = "depositos";
    protected $fillable = ['titulo'];

    public function doumentos()
    {
        return $this->hasMany(Documento::class);
    }
}
