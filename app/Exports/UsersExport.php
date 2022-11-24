<?php

namespace App\Exports;

use App\User;
use App\Http\Controllers\Modulo_Horario\BalancedecargaController;
use App\Http\Controllers\Modulo_Horario\AsignaturasController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return User::get(['asignaturas_id','name','semana','frecuencias','tipodeclase','created_at']);
    }

    public function headings():array{
        return[
            "asignaturas_id",
            "name",
            "semana",
            "frecuencias",
            "tipodeclase",
            "created_at",

        ];
    }


}
