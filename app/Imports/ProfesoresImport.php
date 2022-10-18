<?php

namespace App\Imports;

use App\Models\Modulo_PerfildeUsuario\Profesores;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\Modulo_PerfildeUsuario\GrupoProfesor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ProfesoresImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{

    public function __construct()
    {
        HeadingRowFormatter::default('none');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Profesores([
            'nombre' => $row['Nombres'],
            'apellidos' => $row['Apellidos'],
            'email' => $row['Email'],
            'carnet' => $row['Carné identidad'],
            'anno' => $row['Año académico'],
        ]);

    }

     public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}