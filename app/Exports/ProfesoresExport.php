<?php

namespace App\Exports;

use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\Modulo_Horario\Asignaturas;
use App\Models\Modulo_Horario\Tipo_de_Clase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfesoresExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        //return User::get(['asignaturas_id','name','semana','frecuencias','tipodeclase','created_at']);
        $balancedecarga = Balancedecarga::join("asignaturas", "asignaturas.id", "=", "balance_de_carga.asignaturas_id")->select('nombre','semana','frecuencia', 'tipo_clase')->get();
        return $balancedecarga;

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
