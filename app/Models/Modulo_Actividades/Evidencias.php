<?php

namespace App\Models\Modulo_Actividades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_Actividades\Actividades;
class Evidencias extends Model
{
    use HasFactory;


    protected $table='evidencias';

    protected $fillable =[
        'id',
        'descripcion',
        'actividades_id',
        'imagen',
    ];

     /**
     * Get the grupos that owns the Estudiantes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function actividades()
    {
        return $this->belongsTo(Actividades::class, 'actividades_id');
    }

}

