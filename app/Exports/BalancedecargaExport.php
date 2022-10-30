<?php

namespace App\Exports;

use App\Models\Modulo_Horario\Balancedecarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutosize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\User;

class BalancedecargaExport implements FromCollection, ShouldAutosize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

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
        session()->put('anno', User::find(auth()->id())->anno);
        $anno = session()->get('anno');

        $balancedecarga = Balancedecarga::join('asignaturas', 'asignaturas.id', '=', 'balance_de_carga.asignaturas_id')
            ->select('asignaturas.nombre', 'balance_de_carga.semana', 'balance_de_carga.frecuencia', 'balance_de_carga.tipo_clase')
            ->where('asignaturas.anno', '=', $anno)->get();

        return $balancedecarga;
    }
}