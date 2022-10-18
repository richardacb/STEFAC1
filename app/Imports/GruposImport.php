<?php

namespace App\Imports;

use App\Models\Modulo_PerfildeUsuario\Grupos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class GruposImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
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
        return new Grupos([
            'name' => $row['Grupo'],
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
