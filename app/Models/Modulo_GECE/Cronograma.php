<?php

namespace App\Models\Modulo_GECE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;
    static $rules=[
        // 'title'=>'required',
        // 'description'=>'required',
        // 'start'=>'required',
        // 'end'=>'required'
    ];

    protected $fillable=[
        'title',
        'description',
        'start',
        'end'
    ];
}
