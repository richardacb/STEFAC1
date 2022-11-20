<?php

namespace App\Models\Modulo_Actividades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modulo_Actividades\Actividades;
use App\Models\User;

class Evidencias extends Model

{
    use HasFactory;


    protected $table='evidencias';

    protected $fillable =[
        'id',
        'descripcion',
        'actividades_id',
        'user_id',
        'imagen',
        'estado',
    ];

     /**
     * Get the evidencias that owns the Actividades
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function actividades()
    {
        return $this->belongsTo(Actividades::class, 'actividades_id');
    }


     /**
     * Get the evidencias that owns the Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

