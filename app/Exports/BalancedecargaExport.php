<?php

namespace App\Exports;

use App\Models\Modulo_Horario\Balancedecarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class BalancedecargaExport implements FromCollection, ShouldAutosize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Asignatura',
            'Semana',
            'Frecuencias',
            'Tipo de Clase',

        ];
    }

    public function collection()
    {


        $balancedecarga = Balancedecarga::join("asignaturas", "asignaturas.id", "=", "balance_de_carga.asignaturas_id")->select('nombre','semana','frecuencia', 'tipo_clase')->get();
        return $balancedecarga;



    }

}
