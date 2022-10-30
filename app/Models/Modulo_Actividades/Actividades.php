<?php

namespace App\Models\Modulo_Actividades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_Actividades\Evidencias;

class Actividades extends Model
{
    use HasFactory;

    protected $table='actividades';

    protected $fillable =[
        'id',
        'nombre',
        'año',
        'tipo_actividad'
    ];

 /**
    * Get all of the estudiantes for the Grupos
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function archivos()
    {
        return $this->hasMany(Evidencias::class, 'id');
    }



}
